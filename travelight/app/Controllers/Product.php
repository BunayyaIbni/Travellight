<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HotelModel;

class Product extends BaseController
{
    public function index()
    {
        if (! session()->get('logged_in')){
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('/login/owner'));
         }
        else{
            $product = new HotelModel();
            $data['product'] = $product->findAll();
            return view('products', $data);
        }

    }

    public function add() 
    {
        return view('products_add');
    }

    public function save_product()
    {
        helper(['form']);
        $id = session()->get('idPemilikHotel');

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'location' => 'required|min_length[3]|max_length[500]',
            'desc' => 'required|min_length[3]|max_length[500]',
            'urlGambarHotel' => 'max_length[255]',
        ];

        if ($this->validate($rules)){
            $model = new HotelModel();
            $data = [
                'idPemilikHotel' => $id,
                'namaHotel' => $this->request->getVar('name'),
                'lokasiHotel' => $this->request->getVar('location'),
                'deskripsiHotel' => $this->request->getVar('desc'),
                'urlGambarHotel'     => $this->request->getVar('urlGambarHotel')
            ];
            $model->save($data);
            return redirect()->to('/products');
        } else {
            $data['validation'] = $this->validator;
            echo view('products_add', $data);
        }
    }

    public function edit() 
    {
        return view('products_edit');
    }

    public function edit_product()
    {
        
    }
}
