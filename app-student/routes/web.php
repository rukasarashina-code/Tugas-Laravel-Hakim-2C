<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

//laman utama = login (jika sudah login langsung ke data student)
Route::get('/', function () {
    if (session('logged_in')) {
        return redirect('/student');
    }
    return view('login');
});

//proses login
Route::post('/login', [AuthController::class, 'cek']);

//semua route di dalam group ini harus login dahulu (alias islogin ada di bootstrap/app.php)
Route::group(['middleware' => 'islogin'], function () {
    Route::resource('student', StudentController::class)->except(['show']);
    Route::resource('admin', AdminController::class)->except(['show']);

    Route::get('/logout', [AuthController::class, 'logout']);
});
