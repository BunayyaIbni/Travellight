<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\CustomerModel;
 
class Profile extends BaseController
{
    protected $customer;

    function __construct()
    {
        $this->customer = new CustomerModel();
    }

    public function index()
    {
        //$session = session();
        //echo "Welcome back, ".$session->get('user_name');
        if (! session()->get('logged_in')){
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('/login/customer'));
         }
        else{
            //$data = $customer->where('idCustomer', session()->get('idCustomer'))->first();
            //$id = session()->get('idCustomer');                                           #3 baris ini berguna nnti buat nampin data yg banyak
            //$customer = new CustomerModel;
            $data['customer'] = $this->customer->findAll();
            
            return view('profile', $data);
        }

    }
}