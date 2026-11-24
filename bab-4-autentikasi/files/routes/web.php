<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsLogin;

//agar langsung masuk login
Route::get('/', function () {
    return view('login');
});

//proses login
Route::post('/login', [AuthController::class, 'cek']);

//latihan: daftar mahasiswa
Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'index']);

//kalkulator perkalian
Route::get('/kalkulator', [KalkulatorController::class, 'home']);
Route::post('/kalkulator/proses', [KalkulatorController::class, 'proses']);

//latihan: kalkulator luas segitiga
Route::get('/kalkulator/segitiga', [KalkulatorController::class, 'segitiga']);
Route::post('/kalkulator/segitiga/proses', [KalkulatorController::class, 'segitigaProses']);

//route group yang harus login dahulu (middleware IsLogin)
Route::group(['middleware' => IsLogin::class], function () {
    Route::get('/dashboard', [DashboardController::class, 'home']);
    Route::get('/gallery', [DashboardController::class, 'gallery']);
    Route::get('/about', [DashboardController::class, 'about']);

    Route::resource('employe', EmployeController::class)->except(['show']);

    Route::get('/logout', [AuthController::class, 'logout']);
});
