<?php

use App\Http\Controllers\Pengguna\DashboardController;
use App\Http\Controllers\Pengguna\Kader\KaderController;
use App\Http\Controllers\Pengguna\Kader\KaderExportExcelController;
use App\Http\Controllers\Pengguna\Kader\KaderExportPDFController;
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

        // kader report pdf
        Route::get('kader-export-pdf', KaderExportPDFController::class)->name('kader.pdf.export');
        
        // kader report excel
        Route::get('kader-export-excel', KaderExportExcelController::class)->name('kader.xls.export');

        // setoran kader
        Route::resource('kader-setoran', SetoranController::class);

        // pengguna setoran export pdf
        Route::get('kader-setoran-export-pdf', SetoranExportPDFController::class)->name('pdf.export');

        // pengguna setoran export excel xls
        Route::get('kader-setoran-export-excel', SetoranExportExcelController::class)->name('excel.export');
    });

    // pengguna profile
    Route::get('profile', ProfileController::class)->name('profile');

    // pengguna profile update
    Route::put('profile', ProfileUpdateController::class)->name('profile.update');
});