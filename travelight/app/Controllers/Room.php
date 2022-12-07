<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomModel;

class Room extends BaseController
{
    protected $room;
 
    function __construct()
    {
        $this->room = new RoomModel();
    }

    public function index()
    {
        if (! session()->get('logged_in')){
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('/login/owner'));
         }
        else{
            $room = new RoomModel();
            $data['room'] = $room->findAll();
            return view('room', $data);
        }

    }

    public function add() 
    {
        return view('rooms_add');
    }

    public function save_room()
    {
        helper(['form']);
        //$id = session()->get('idPemilikHotel');

        $rules = [
            'jenisKmr' => 'required|min_length[3]|max_length[30]',
            'harga' => 'required|min_length[3]|max_length[30]',
            'wktMulai' => 'required|min_length[3]|max_length[100]',
            'wktAkhir' => 'required|min_length[3]|max_length[100]',
            'stok' => 'required|min_length[3]|max_length[30]'
        ];

        if ($this->validate($rules)){
            $model = new RoomModel();
            $data = [
                'idHotel' => $id,
                'jenisKamar' => $this->request->getVar('jenisKmr'),
                'harga' => $this->request->getVar('harga'),
                'waktuMulaiTersedia' => $this->request->getVar('wktMulai'),
                'waktuAkhirTersedia' => $this->request->getVar('wktAkhir'),
                'stok' => $this->request->getVar('stok')
            ];
            $model->save($data);
            return redirect()->to('/rooms');
        } else {
            $data['validation'] = $this->validator;
            echo view('products_add', $data);
        }
    }
    
    //belum

    function edit($id)
    {
        $dataProduct = $this->product->find($id);
        if (empty($dataProduct)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Produk tidak ditemukan');
        }
        $data['product'] = $dataProduct;
        return view('products_edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'location' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'desc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->product->update($id, [
            'namaHotel' => $this->request->getVar('name'),
            'lokasiHotel' => $this->request->getVar('location'),
            'deskripsiHotel' => $this->request->getVar('desc'),
            'urlGambarHotel'     => $this->request->getVar('urlGambarHotel')
        ]);
        session()->setFlashdata('message', 'Update Data Produk Berhasil');
        return redirect()->to('/products');
    }

    function delete($id){
        $dataProduct = $this->product->find($id);
        if (empty($dataProduct)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data produk tidak ditemukan');
        }
        $this->product->delete($id);
        session()->setFlashdata('message', 'Delete Data Produk Berhasil');
        return redirect()->to('/products');
    }
}
