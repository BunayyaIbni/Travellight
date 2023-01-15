<?php namespace App\Models;
 
use CodeIgniter\Model;

class CustomerModel extends Model{
    protected $table = 'customer';
    protected $allowedFields = ['idCustomer','username','password', 'urlProfil', 'namaCustomer', 'noHpCustomer', 'emailCustomer', 'alamatCustomer'];
    protected $primaryKey = 'idCustomer';
}