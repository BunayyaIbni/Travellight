<?php namespace App\Controllers;
 
 use App\Controllers\BaseController;
 use App\Models\PesananModel;
 use App\Models\PaymentModel;
 use \DateTime;
 use \DateInterval;

class Payment extends BaseController
{
    protected $order;
    protected $payment;

    function __construct()
    {
        $this->order = new PesananModel();
        $this->payment = new PaymentModel();
    }

    function index() {
        if (session()->get('logged_in') != "customer"){
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('/'));
        } else {
            $idCustomer = session()->get('idCustomer');
            $db      = \Config\Database::connect();
            $builder = $db->table('pesanan');
            // $builder->where('idCustomer ==', $idCustomer);
            $data['order'] = $builder->where('idCustomer =', $idCustomer)
                            ->get()->getResult('array');
            return view('orders', $data);
        }
    }

    function bayar($id) {
        $dataOrder = $this->order->find($id);
        if (empty($dataOrder)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pesanan tidak ditemukan');
        }
        $data['order'] = $dataOrder;
        return view('pay_view', $data);
    }

    public function save_bayar($id)
    {
        helper(['form']);

        $rules = [
            'buktiTf' => 'required|min_length[3]|max_length[255]'
        ];

        if ($this->validate($rules)){
            $model = new PesananModel();
            $data = [
                'idPesanan' => $id,
                'urlGambarPembayaran' => $this->request->getVar('buktiTf'),
                'statusPembayaran' => 'paid'
            ];
            $dataPesanan = $this->order->find($id);
            // cek waktu saat ini < tenggat waktu
            $waktu = new DateTime();
            $currTime = $waktu->format('Y-m-d H:i:s');
            if ($currTime > $dataPesanan['tenggatWaktuPesanan']){
                session()->setFlashdata('tenggatbyr', 'Pembayaran tidak dapat dilakukan! - melebihi batas waktu pembayaran');
                return redirect()->to(base_url('pay/'.$id));
            } else {
                // update status pesanan
                $dataPesanan['statusPesanan'] = 'paid';
                $model->save($dataPesanan);
                $this->payment->save($data);
                return redirect()->to(base_url('/orders'));
            }
        } else {
            $data['validation'] = $this->validator;
            echo view('pay_view', $data);
        }
    }
}