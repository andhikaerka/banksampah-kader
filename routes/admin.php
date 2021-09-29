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
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProfileUpdateController;
use App\Http\Controllers\Admin\Report\ReportEdukasiController;
use App\Http\Controllers\Admin\Report\ReportSetoranController;

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

    // admin profile
    Route::get('profile', ProfileController::class)->name('profile');

    // admin profile update
    Route::put('profile', ProfileUpdateController::class)->name('profile.update');

    Route::prefix('laporan')->name('laporan.')->group(function () {
        // Laporan Setoran
        Route::get('setoran', ReportSetoranController::class)->name('setoran');

        // Laporan Edukasi
        Route::get('edukasi', ReportEdukasiController::class)->name('edukasi');
    });
});