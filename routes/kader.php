<?php

use App\Http\Controllers\Kader\DashboardController;
use App\Http\Controllers\Kader\Kaderisasi\KaderisasiController;
use App\Http\Controllers\Kader\ProfileController;
use App\Http\Controllers\Kader\ProfileUpdateController;

Route::prefix('kader')->name('kader.')->group(function () {

    Route::group(['middleware' => ['isKaderProfileComplete']], function () {
        // dashboard
        Route::get('dashboard', DashboardController::class)->name('dashboard');

        // kader
        Route::resource('kaderisasi', KaderisasiController::class);

        // setoran kader
        Route::resource('setoran', SetoranController::class);
    });

    // pengguna profile
    Route::get('profile', ProfileController::class)->name('profile');

    // pengguna profile update
    Route::put('profile', ProfileUpdateController::class)->name('profile.update');
});