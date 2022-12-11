<?php namespace App\Models;
 
use CodeIgniter\Model;

class RoomModel extends Model{
    protected $table = 'kamar';
    protected $allowedFields = ['idKamar','idHotel','jenisKamar', 'harga', 'waktuMulaiTersedia', 'waktuAkhirTersedia', 'stok'];
    protected $primaryKey = 'idKamar';
}