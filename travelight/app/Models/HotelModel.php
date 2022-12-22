<?php namespace App\Models;
 
use CodeIgniter\Model;

class HotelModel extends Model{
    protected $table = 'hotel';
    protected $allowedFields = ['idHotel','idPemilikHotel','namaHotel', 'lokasiHotel', 'deskripsiHotel', 'urlGambarHotel'];
    protected $primaryKey = 'idHotel';
}
