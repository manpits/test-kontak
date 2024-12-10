<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $fillable = ['kontak_id', 'pendidikan_id', 'tahun_masuk', 'tahun_lulus'];
}
