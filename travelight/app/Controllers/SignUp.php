<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\AdminModel;
use App\Models\CustomerModel;
use App\Models\OwnerModel;

class SignUp extends BaseController
{
    public function customer()
    {
        helper(['form']);
        $data = [];
        echo view('signup_customer', $data);
    }

    public function save_customer()
    {
        helper(['form']);

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'phone_num' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[3]|max_length[255]',
            'address' => 'required|min_length[3]|max_length[500]',
            'username' => 'required|min_length[3]|max_length[20]',
            'password' => 'required|min_length[3]|max_length[20]',
            'confpassword' => 'required|min_length[3]|max_length[20]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)){
            $model = new CustomerModel();
            $data = [
                'namaCustomer' => $this->request->getVar('name'),
                'noHpCustomer' => $this->request->getVar('phone_num'),
                'emailCustomer' => $this->request->getVar('email'),
                'alamatCustomer' => $this->request->getVar('address'),
                'username'     => $this->request->getVar('username'),
                'password'     => $this->request->getVar('password')
            ];
            $model->save($data);
            return redirect()->to('/login/customer');
        } else {
            $data['validation'] = $this->validator;
            echo view('signup_customer', $data);
        }
    }

    public function owner()
    {
        helper(['form']);
        $data = [];
        echo view('signup_owner', $data);
    }

    public function save_owner()
    {
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'phone_num' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[3]|max_length[255]',
            'address' => 'required|min_length[3]|max_length[500]',
            'bank_acc' => 'required|min_length[3]|max_length[50]',
            'username' => 'required|min_length[3]|max_length[20]',
            'password' => 'required|min_length[3]|max_length[20]',
            'confpassword' => 'required|min_length[3]|max_length[20]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)){
            $model = new OwnerModel();
            $data = [
                'namaPemilikHotel' => $this->request->getVar('name'),
                'noHpPemilikHotel' => $this->request->getVar('phone_num'),
                'emailPemilikHotel' => $this->request->getVar('email'),
                'alamatPemilikHotel' => $this->request->getVar('address'),
                'noRekPemilikHotel' => $this->request->getVar('bank_acc'),
                'username'     => $this->request->getVar('username'),
                'password'     => $this->request->getVar('password')
            ];
            $model->save($data);
            return redirect()->to('/login/owner');
        } else {
            $data['validation'] = $this->validator;
            echo view('signup_owner', $data);
        }
    }
}
