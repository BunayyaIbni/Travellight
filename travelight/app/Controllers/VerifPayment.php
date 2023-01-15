<?php namespace App\Controllers;
 
 use App\Controllers\BaseController;
 use App\Models\PesananModel;
 use App\Models\PaymentModel;
 use \DateTime;
 use \DateInterval;

class VerifPayment extends BaseController
{
    protected $order;
    protected $payment;

    function __construct()
    {
        $this->order = new PesananModel();
        $this->payment = new PaymentModel();
    }

    function index() {
        if (session()->get('logged_in') != "admin"){
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('/'));
        } else {
            $data['payment'] = $this->payment->findAll();
            return view('verifpayment_view', $data);
        }
    }

    function verif($id) {
        $dataPembayaran = $this->payment->find($id);
        if (empty($dataPembayaran)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pembayaran tidak ditemukan');
        }
        $data['payment'] = $dataPembayaran;
        return view('verif_view', $data);
    }

    function save_verif($id) {
        $modelPembayaran = new PaymentModel();
        $modelPesanan = new PesananModel();
        $dataPembayaran = $this->payment->find($id);
        $dataPesanan = $this->order->find($dataPembayaran['idPesanan']);
        $dataPembayaran['statusPembayaran'] = 'verified';
        $dataPesanan['statusPesanan'] = 'verified';
        $modelPembayaran->save($dataPembayaran);
        $modelPesanan->save($dataPesanan);
        return redirect()->to(base_url('/verifpembayaran'));
    }
}