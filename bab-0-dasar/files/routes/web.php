<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KalkulatorController;

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
