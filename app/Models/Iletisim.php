<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iletisim extends Model
{
    protected $primaryKey = 'KAYITID';
    protected $table = 'iletisim';
    protected $fillable = ['ADSOYAD', 'EPOSTA','TELEFON','BASLIK','MESAJ'];
}
