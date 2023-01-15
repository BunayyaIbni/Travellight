<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HotelModel;
use App\Models\RoomModel;

class Product extends BaseController
{
    protected $product;
    protected $room;
    
    function __construct()
    {
        $this->product = new HotelModel();
        $this->room = new RoomModel();
    }

    public function index()
    {
        if (session()->get('logged_in') != "owner"){
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('/'));
        }
        else{
            $idPemilikHotel = session()->get('idPemilikHotel');
            $db      = \Config\Database::connect();
            $builder = $db->table('hotel');
            $data['product'] = $builder->where('idPemilikHotel =', $idPemilikHotel)
                            ->get()->getResult('array');
            $data['room'] = $this->room->findAll();
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
            'desc' => 'required|min_length[3]|max_length[500]'
        ];
        $upload = $this->request->getFile('urlGambarHotel');
        $fileName = $upload->getName();
        $upload->move('../public/assets/imghotel/', $fileName);
        
        if ($this->validate($rules)){
            
            $data = [
                'idPemilikHotel' => $id,
                'namaHotel' => $this->request->getVar('name'),
                'lokasiHotel' => $this->request->getVar('location'),
                'deskripsiHotel' => $this->request->getVar('desc'),
                'urlGambarHotel'     => $upload->getName()
            ];
            $this->product->save($data);
            return redirect()->to(base_url('/products'));
        } else {
            $data['validation'] = $this->validator;
            echo view('products_add', $data);
        }
    }

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
            'deskripsiHotel' => $this->request->getVar('desc')
        ]);
        session()->setFlashdata('message', 'Update Data Produk Berhasil');
        return redirect()->to(base_url('/products'));
    }

    function delete($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('kamar');
        $builder->delete(['idHotel' => $id]);
        $this->product->delete($id);      //karena udah terhubung / relasi dengan foreign key di table kamar, maka data di kamar harus dihapus juga
        session()->setFlashdata('message', 'Delete Data Produk Berhasil');
        return redirect()->to(base_url('/products'));
    }

    function get_orders(){
        $idPemilikHotel = session()->get('idPemilikHotel');
        $db      = \Config\Database::connect();
        $data['order'] = $db->table('pesanan')->join('kamar','pesanan.idKamar=kamar.idKamar')
                            ->join('hotel', 'kamar.idHotel=hotel.idHotel')
                            ->where('hotel.idPemilikHotel =', $idPemilikHotel)
                            ->get()->getResult('array');
        return view('orders_owner', $data);
    }
}
