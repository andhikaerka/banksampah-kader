<?php

use App\Http\Controllers\Pengguna\DashboardController;
use App\Http\Controllers\Pengguna\Kader\KaderController;
use App\Http\Controllers\Pengguna\ProfileController;
use App\Http\Controllers\Pengguna\Setoran\SetoranController;

Route::prefix('pengguna')->name('pengguna.')->group(function () {

    // dashboard
    Route::get('dashboard', DashboardController::class);

    // kader
    Route::resource('kader', KaderController::class);

    // setoran kader
    Route::resource('setoran', SetoranController::class);
    
    // pengguna profile
    Route::resource('profile', ProfileController::class);    
});