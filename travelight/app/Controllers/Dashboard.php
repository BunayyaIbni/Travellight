<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Dashboard extends BaseController
{
    public function index()
    {
        //$session = session();
        //echo "Welcome back, ".$session->get('user_name');

        if (! session()->get('logged_in')){
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('/'));
         }
         return view('user_view');

    }
}