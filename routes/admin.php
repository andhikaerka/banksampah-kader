<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Kader\KategoriController as KaderKategoriController;
use App\Http\Controllers\Admin\Kader\StatusController;
use App\Http\Controllers\Admin\Master\BankSampahController;
use App\Http\Controllers\Admin\Master\BarangBeratController;
use App\Http\Controllers\Admin\Master\BarangController;
use App\Http\Controllers\Admin\Master\BarangKategoriController;
use App\Http\Controllers\Admin\Pengguna\KategoriController;
use App\Http\Controllers\Admin\Pengguna\PenggunaApprovalController;
use App\Http\Controllers\Admin\Pengguna\PenggunaController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    // master bank sampah
    Route::resource('bank-sampah', BankSampahController::class);

    // master barang
    Route::resource('barang', BarangController::class);

    // master barang berat
    Route::resource('barang-berat', BarangBeratController::class);

    // master barang kategori
    Route::resource('barang-kategori', BarangKategoriController::class);

    // pengguna
    Route::resource('pengguna', PenggunaController::class)->only([
        'index', 'show'
    ]);

    // pengguna kategori
    Route::resource('pengguna-kategori', KategoriController::class);

    // pengguna approval
    Route::put('pengguna-approval/{pengguna}', PenggunaApprovalController::class)->name('approval');

    // kader kategori
    Route::resource('kader-kategori', KaderKategoriController::class);

    // kader status
    Route::resource('kader-status', StatusController::class);
});