<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // tabel: admins, primary key bukan "id" sehingga harus didefinisikan
    protected $primaryKey = 'id_admin';

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];
}
