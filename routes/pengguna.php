<?php

use App\Http\Controllers\Pengguna\DashboardController;
use App\Http\Controllers\Pengguna\Kader\KaderController;
use App\Http\Controllers\Pengguna\Setoran\SetoranController;

Route::prefix('pengguna')->name('pengguna.')->group(function () {

    // master bank sampah
    Route::name('dashboard.')->group(function () {
        Route::resource('dashboard', DashboardController::class);
    });

    // master bank sampah
    Route::name('kader.')->group(function () {
        Route::resource('kader', KaderController::class);
    });

    // master barang
    Route::name('setoran.')->group(function () {
        Route::resource('setoran', SetoranController::class);
    });
});