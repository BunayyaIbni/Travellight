<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomModel;
use App\Models\HotelModel;

class Room extends BaseController
{
    protected $room;
    protected $product;

    function __construct()
    {
        $this->room = new RoomModel();
        $this->product = new HotelModel();
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
            // return view('room', $data);
        }

    }

    public function add($id) 
    {
        $product = new HotelModel();
        $data['room'] = $product->find($id);
        return view('rooms_add', $data);
    }

    public function save_room($id)
    {
        helper(['form']);
        if (!$this->validate([
            'jenisKmr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $rules = [
            'jenisKmr' => 'required|min_length[3]|max_length[30]',
            'harga' => 'required|min_length[3]|max_length[30]',
            'stok' => 'required|min_length[1]|max_length[30]'
        ];
        if ($this->validate($rules)){
            $model = new RoomModel();
            $data = [
                'idHotel' => $id,
                'jenisKamar' => $this->request->getVar('jenisKmr'),
                'harga' => $this->request->getVar('harga'),
                'stok' => $this->request->getVar('stok'),
                'status' => $this->request->getVar('status')
            ];
            $model->save($data);
            return redirect()->to(base_url('/products'));
        } else {
            $data['validation'] = $this->validator;
            echo view('rooms_add', $data);
        }
    }

    function edit($id)
    {
        $dataProduct = $this->room->find($id);
        if (empty($dataProduct)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kamar tidak ditemukan');
        }
        $data['room'] = $dataProduct;
        return view('rooms_edit', $data);
    }

    public function update_room($id)
    {
        if (!$this->validate([
            'jenisKamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to(base_url('/rooms/edit/'.$id));
        }

        $this->room->update($id, [
            'jenisKamar'    => $this->request->getVar('jenisKamar'),
            'harga'         => $this->request->getVar('harga'),
            'stok'          => $this->request->getVar('stok'),
            'status'        => $this->request->getVar('status')
        ]);        
        session()->setFlashdata('message', 'Update Data Produk Berhasil');
        return redirect()->to(base_url('/products'));
    }

    function delete($id){
        $dataProduct = $this->room->find($id);
        if (empty($dataProduct)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kamar tidak ditemukan');
        }
        $this->room->delete($id);
        session()->setFlashdata('message', 'Delete Data Produk Berhasil');
        return redirect()->to(base_url('/products'));
    }
}
