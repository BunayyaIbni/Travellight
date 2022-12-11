<?php namespace App\Controllers;
 
 use App\Controllers\BaseController;
 use App\Models\HotelModel;

class Dashboard extends BaseController
{
    protected $product;

    function __construct()
    {
        $this->product = new HotelModel();
    }
    public function index()
    {
        //$session = session();
        //echo "Welcome back, ".$session->get('user_name');

        if (! session()->get('logged_in')){
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
        return view('products_view', $data);
    }
}