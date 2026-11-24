<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;

Route::get('/', function () {
    return view('welcome');
});

//latihan: daftar mahasiswa
Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'index']);

//kalkulator perkalian
Route::get('/kalkulator', [KalkulatorController::class, 'home']);
Route::post('/kalkulator/proses', [KalkulatorController::class, 'proses']);

//latihan: kalkulator luas segitiga
Route::get('/kalkulator/segitiga', [KalkulatorController::class, 'segitiga']);
Route::post('/kalkulator/segitiga/proses', [KalkulatorController::class, 'segitigaProses']);

//sistem templating
Route::get('/dashboard', [DashboardController::class, 'home']);
Route::get('/gallery', [DashboardController::class, 'gallery']);
Route::get('/about', [DashboardController::class, 'about']);

//CRUD pegawai (index, create, store, edit, update, destroy)
Route::resource('employe', EmployeController::class)->except(['show']);
