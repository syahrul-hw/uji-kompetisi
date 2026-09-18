<?php


use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AuthManualController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kategori', KategoriController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('buku', BukuController::class);

// route untuk login logout manual
Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'loginProcess'])->name('login.process');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');