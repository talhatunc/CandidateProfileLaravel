<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $primaryKey = 'KAYITID';
    protected $table = 'galeri';
    protected $fillable = ['BASLIK', 'LINK'];
}
