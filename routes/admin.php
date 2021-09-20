<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Master\BankSampahController;
use App\Http\Controllers\Admin\Master\BarangBeratController;
use App\Http\Controllers\Admin\Master\BarangController;
use App\Http\Controllers\Admin\Master\BarangKategoriController;
use App\Http\Controllers\Admin\Pengguna\PenggunaController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // master bank sampah
    Route::resource('bank-sampah', BankSampahController::class);

    // master barang
    Route::resource('barang', BarangController::class);

    // master barang berat
    Route::resource('barang-berat', BarangBeratController::class);

    // master barang kategori
    Route::resource('barang-kategori', BarangKategoriController::class);

    // master barang kategori
    Route::resource('pengguna', PenggunaController::class);
});