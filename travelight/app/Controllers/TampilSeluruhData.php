<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Models\OwnerModel;
 
class TampilSeluruhData extends BaseController
{

    /*
    protected $customer;

    function __construct()
    {
        $this->customer = new CustomerModel();         // buatan gisel
    }

     public function index()  buatan gisel
    {    
        //$data = $customer->where('idCustomer', session()->get('idCustomer'))->first();
        //$id = session()->get('idCustomer');                                       #3 baris ini berguna nnti buat nampin data yg banyak
        //$customer = new CustomerModel;
        $data['customer'] = $this->customer->findAll();
        
        return view('profile', $data);
    } */

    public function customer()  //buatan ibni
    {    
        
        $customer = new CustomerModel;
        $data['customer'] = $customer->findAll();
        
        return view('tampilseluruhdata', $data);
    }



    public function owner()  //buatan ibni
    {    
        
    }
}