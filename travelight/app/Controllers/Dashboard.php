<?php namespace App\Controllers;
 
 use App\Controllers\BaseController;
 use App\Models\HotelModel;
 use App\Models\RoomModel;

class Dashboard extends BaseController
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
        if (session()->get('logged_in') != "customer"){
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('/'));
        } else {
            $data['product'] = $this->product->findAll();
            return view('user_view', $data);
        }
    }

    function view($id)
    {
        $dataProduct = $this->product->find($id);
        if (empty($dataProduct)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Produk tidak ditemukan');
        }
        $data['product'] = $dataProduct;
        $data['room'] = $this->room->findAll();
        return view('products_view', $data);
    }
}