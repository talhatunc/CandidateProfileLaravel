<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixed extends Model
{
    protected $primaryKey = 'KAYITID';
    protected $table = 'fixed';
    protected $fillable = ['OZGECMIS','youtube','facebook','twitter','instagram'];
}
