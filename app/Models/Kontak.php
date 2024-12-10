<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class Kontak extends Model
{
    use EncryptedAttribute;
    protected $fillable = ['nama', 'alamat', 'telepon', 'tgllahir', 'gender'];
    protected $encryptable = [
        'alamat',
        'telepon'
    ];
}
