<?php namespace App\Models;
 
use CodeIgniter\Model;

class PaymentModel extends Model{
    protected $table = 'pembayaran';
    protected $allowedFields = ['idPembayaran', 'idPesanan', 'urlGambarPembayaran', 'statusPembayaran'];
    protected $primaryKey = 'idPembayaran';
}