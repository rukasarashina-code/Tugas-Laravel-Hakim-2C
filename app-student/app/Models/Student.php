<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // tabel: students, primary key: id (default)
    protected $fillable = ['nim', 'nama', 'alamat', 'gender', 'jurusan'];
}
