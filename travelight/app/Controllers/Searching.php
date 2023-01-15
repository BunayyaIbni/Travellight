<?php namespace App\Controllers;
 
 use App\Controllers\BaseController;
 use App\Models\HotelModel;
 use App\Models\RoomModel;
 use \DateTime;
 use \DateInterval;

 class Searching extends BaseController
{
    protected $room;
    protected $hotel;

    function __construct()
    {
        $this->room = new RoomModel();
        $this->hotel = new HotelModel();
    }

    public function cari()
    {
        helper(['form']);

        $rules = [
            'banyak' => 'required|min_length[1]',
            'lokasi' => 'required|min_length[1]',
            'checkin' => 'required',
            'checkout' => 'required'
        ];

        if ($this->validate($rules)){
            $bykPesanan = $this->request->getVar('banyak');
            if ($bykPesanan <= 0){
                session()->setFlashdata('underbook', 'Banyak kamar tidak valid');
                return redirect()->to(base_url('dashboard'));
            } else {
                if (($this->request->getVar('checkin') == $this->request->getVar('checkout')) || 
                ($this->request->getVar('checkin') > $this->request->getVar('checkout'))){
                    session()->setFlashdata('invaliddate', 'Tanggal check in dan check out tidak valid');
                    return redirect()->to(base_url('dashboard'));
                }
            }
            $db      = \Config\Database::connect();
            $squery = 'SELECT * FROM kamar join hotel on kamar.idHotel=hotel.idHotel where kamar.stok >= ' . $this->request->getVar('banyak') .
                            ' and LOWER(hotel.lokasiHotel) LIKE LOWER("%' . $this->request->getVar('lokasi') . '%") and kamar.status = "available"  group by kamar.idHotel';
            $result = $db->query($squery);
            $data['hotel'] = $result->getResult('array');
            echo view('search_view', $data);
        } else {
            $data['validation'] = $this->validator;
            return redirect()->to(base_url('/dashboard'));
        }
    }
}