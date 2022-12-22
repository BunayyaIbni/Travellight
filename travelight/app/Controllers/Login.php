<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdminModel;
use App\Models\CustomerModel;
use App\Models\OwnerModel;
 
class Login extends BaseController
{

    public function customer()
    {
        helper(['form']);
        echo view('login_customer');
    }

    public function customer_auth()
    {
        $session = session();
        $model = new CustomerModel();
        $username= $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();  //$data untuk ngambil dari databse
        if($data){
            $pass = $data['password'];
            if($password == $data['password']){
                $ses_data = [
                    'idCustomer'            => $data['idCustomer'],  //yg paling kiri itu untuk label
                    'username'              => $data['username'],
                    'password'              => $data['password'],
                    'urlFotoProfil'         => $data['urlFotoProfil'],
                    'namaCustomer'          => $data['namaCustomer'],
                    'noHpCustomer'          => $data['noHpCustomer'],
                    'emailCustomer'         => $data['emailCustomer'],
                    'alamatCustomer'        => $data['alamatCustomer'],
                    'logged_in'             => 'customer'
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('dashboard'));
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('login/customer'));
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to(base_url('login/customer'));
        }
    }




    public function owner()
    {
        helper(['form']);
        echo view('login_owner');
    }

    public function owner_auth()
    {
        $session = session();
        $model = new OwnerModel();
        $username= $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();  //$data untuk ngambil dari databse
        if($data){
            $pass = $data['password'];
            if($password == $data['password']){
                $ses_data = [
                    'idPemilikHotel'            => $data['idPemilikHotel'],  //yg paling kiri itu untuk label
                    'username'                  => $data['username'],
                    'password'                  => $data['password'],
                    'urlFotoProfil'             => $data['urlFotoProfil'],
                    'namaPemilikHotel'          => $data['namaPemilikHotel'],
                    'noHpPemilikHotel'          => $data['noHpPemilikHotel'],
                    'emailPemilikHotel'         => $data['emailPemilikHotel'],
                    'alamatPemilikHotel'        => $data['alamatPemilikHotel'],
                    'noRekPemilikHotel'         => $data['noRekPemilikHotel'],
                    'logged_in'                 => 'owner'
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('products'));
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('login/owner'));
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to(base_url('login/owner'));
        }
    }





    public function admin()
    {
        helper(['form']);
        echo view('login_admin');
    } 
 
    public function admin_auth()
    {
        $session = session();
        $model = new AdminModel();
        $username= $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();  
        if($data){
            $pass = $data['password'];
            if($password == $data['password']){
                $ses_data = [
                    'idAdministrator'       => $data['idAdministrator'], 
                    'username'              => $data['username'],
                    'password'              => $data['password'],
                    'logged_in'             => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('verifpembayaran'));
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('login/admin'));
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to(base_url('login/admin'));
        }
    }
 



    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
} 