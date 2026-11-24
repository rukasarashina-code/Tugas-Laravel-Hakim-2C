<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

//laman utama langsung diarahkan ke /home
Route::redirect('/', '/home');

Route::get('/home', [DashboardController::class, 'home']);
Route::get('/product', [DashboardController::class, 'product']);
Route::get('/service', [DashboardController::class, 'service']);
Route::get('/contact', [DashboardController::class, 'contact']);
Route::get('/about', [DashboardController::class, 'about']);

//CRUD admin (index, create, store, edit, update, destroy)
Route::resource('admin', AdminController::class)->except(['show']);
