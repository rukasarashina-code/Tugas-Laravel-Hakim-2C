<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // nama tabel otomatis "admins" (bentuk jamak dari nama Model)
    // primary key bukan "id", jadi harus didefinisikan
    protected $primaryKey = 'id_admin';

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];
}
