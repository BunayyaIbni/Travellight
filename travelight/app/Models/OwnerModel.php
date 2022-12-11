<?php namespace App\Models;
 
use CodeIgniter\Model;

class OwnerModel extends Model{
    protected $table = 'pemilik_hotel';
    protected $allowedFields = ['idPemilikHotel','username','password', 'urlFotoProfil', 'namaPemilikHotel', 'noHpPemilikHotel', 'emailPemilikHotel', 'alamatPemilikHotel', 'noRekPemilikHotel'];
}