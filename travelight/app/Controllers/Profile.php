<?php namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\CustomerModel;
 
class Profile extends BaseController
{
    protected $customer;

    function __construct()
    {
        $this->customer = new CustomerModel();
    }

    function edit($id)
    {
        $dataCustomer = $this->customer->find($id);
        if (empty($dataCustomer)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Customer tidak ditemukan');
        }
        $data['customer'] = $dataCustomer;
        return view('edit_profile', $data);
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
            'phone_num' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        $this->customer->update($id, [
            'namaCustomer' => $this->request->getVar('name'),
            'noHpCustomer' => $this->request->getVar('phone_num'),
            'emailCustomer' => $this->request->getVar('email'),
            'alamatCustomer' => $this->request->getVar('address'),
            'username'     => $this->request->getVar('username')
        ]);
        session()->setFlashdata('message', 'Update Data Customer Berhasil');
        return redirect()->to(base_url('/dashboard'));
    }
}