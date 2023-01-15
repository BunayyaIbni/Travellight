<?php namespace App\Controllers;
 
 use App\Controllers\BaseController;
 use App\Models\HotelModel;
 use App\Models\RoomModel;
 use App\Models\PesananModel;
 use \DateTime;
 use \DateInterval;

 class Booking extends BaseController
{
    protected $room;
    protected $pesanan;

    function __construct()
    {
        $this->room = new RoomModel();
        $this->pesanan = new PesananModel();
    }

    public function pesan($id)
    {
        $dataRoom = $this->room->find($id);
        if (empty($dataRoom)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kamar tidak ditemukan');
        }
        $data['room'] = $dataRoom;
        return view('book_view', $data);
    }

    public function save_pesan($id)
    {
        helper(['form']);
        $idCustomer = session()->get('idCustomer');

        $rules = [
            'banyak' => 'required|min_length[1]',
            'checkin' => 'required',
            'checkout' => 'required'
        ];

        if ($this->validate($rules)){
            $model = new RoomModel();
            $data = [
                'idKamar' => $id,
                'idCustomer' => $idCustomer,
                'statusPesanan' => 'ordered',
                'waktuCheckIn' => $this->request->getVar('checkin'),
                'waktuCheckOut' => $this->request->getVar('checkout')
            ];
            $dataRoom = $this->room->find($id);
            // cek stok kamar >= banyak pesanan
            $bykPesanan = $this->request->getVar('banyak');
            if ($dataRoom['stok'] < $bykPesanan){
                session()->setFlashdata('overbook', 'Banyak kamar yang dipesan melebihi kamar yang tersedia');
                return redirect()->to(base_url('book/'.$id));
            } else if ($bykPesanan <= 0){
                session()->setFlashdata('underbook', 'Banyak kamar yang dipesan tidak valid');
                return redirect()->to(base_url('book/'.$id));
            } else {
                if (($data['waktuCheckIn'] == $data['waktuCheckOut']) ||
                ($this->request->getVar('checkin') > $this->request->getVar('checkout'))){
                    session()->setFlashdata('invaliddate', 'Tanggal check in dan check out tidak valid');
                    return redirect()->to(base_url('book/'.$id));
                } else {
                    // hitung total harga
                    $wktCheckIn = new DateTime($this->request->getVar('checkin'));
                    $wktCheckOut = new DateTime($this->request->getVar('checkout'));
                    $selisih = $wktCheckOut->diff($wktCheckIn);
                    $totalHarga = ($selisih->d) * $bykPesanan * $dataRoom['harga'];
                    $data['totalHargaPesanan'] = $totalHarga;
                    // update sisa kamar
                    $dataRoom['stok'] -= $bykPesanan;
                    if ($dataRoom['stok'] == 0){
                        $dataRoom['status'] = 'not available';
                    }
                    // waktu pesanan dan tenggat waktu pembayaran
                    $waktu = new DateTime();
                    $data['waktuPesanan'] = $waktu->format('Y-m-d H:i:s');
                    $hours = 24;
                    $tgWaktu = (clone $waktu)->add(new DateInterval("PT{$hours}H"));
                    $data['tenggatWaktuPesanan'] = $tgWaktu->format('Y-m-d H:i:s');

                    $model->save($dataRoom);
                    $this->pesanan->save($data);
                    return redirect()->to(base_url('/orders'));
                }
            }
        } else {
            $data['validation'] = $this->validator;
            echo view('book_view', $data);
        }
    }
}