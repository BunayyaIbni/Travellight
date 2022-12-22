<?php namespace App\Models;
 
use CodeIgniter\Model;

class PesananModel extends Model{
    protected $table = 'pesanan';
    protected $allowedFields = ['idPesanan', 'idKamar','idCustomer','waktuPesanan', 'tenggatWaktuPesanan', 'statusPesanan', 'totalHargaPesanan', 'waktuCheckIn', 'waktuCheckOut'];
    protected $primaryKey = 'idPesanan';
}