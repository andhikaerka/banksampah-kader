<?php

use App\Http\Controllers\Pengguna\DashboardController;
use App\Http\Controllers\Pengguna\Kader\KaderController;
use App\Http\Controllers\Pengguna\Kader\KaderImportController;
use App\Http\Controllers\Pengguna\ProfileController;
use App\Http\Controllers\Pengguna\ProfileUpdateController;
use App\Http\Controllers\Pengguna\Setoran\SetoranController;
use App\Http\Controllers\Pengguna\Setoran\SetoranExportExcelController;
use App\Http\Controllers\Pengguna\Setoran\SetoranExportPDFController;

Route::prefix('pengguna')->name('pengguna.')->group(function () {

    Route::group(['middleware' => ['isProfileComplete', 'isAdminApprove']], function () {
        // dashboard
        Route::get('dashboard', DashboardController::class)->name('dashboard');

        // kader
        Route::resource('kader', KaderController::class);
        
        // kader import
        Route::resource('kader-import', KaderImportController::class)->only([
            'create', 'store'
        ]);

        // setoran kader
        Route::resource('kader-setoran', SetoranController::class);
    });

    // pengguna profile
    Route::get('profile', ProfileController::class)->name('profile');

    // pengguna profile update
    Route::put('profile', ProfileUpdateController::class)->name('profile.update');

    // pengguna setoran export pdf
    Route::get('pdf', SetoranExportPDFController::class)->name('pdf.export');

    // pengguna setoran export excel xls
    Route::get('excel', SetoranExportExcelController::class)->name('excel.export');
});