<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    // Nama tabel = bentuk jamak dari nama Model (employes) dan primary key = id,
    // jadi tidak perlu mendefinisikan $table maupun $primaryKey.
    //
    // Jika berbeda, definisikan seperti ini:
    // protected $table = 'tb_pegawai';
    // protected $primaryKey = 'nim';
}
