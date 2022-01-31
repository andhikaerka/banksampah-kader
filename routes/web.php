<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\HomeDashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');
Route::get('/show', [HomepageController::class, 'show'])->name('homepage.show');

require __DIR__.'/auth.php';

Route::group(['middleware'=> ['auth']], function () {

    // Dashboard Default
    Route::get('/dashboard', HomeDashboardController::class)->name('dashboard');
    
    Route::get('/ganti-password', [GantiPasswordController::class, 'create'])->name('ganti.password');
    Route::post('/ganti-password', [GantiPasswordController::class, 'store'])->name('ganti.password.store');
    
    // Location
    Route::post('city/{province}', CityController::class);
    Route::post('district/{city}', DistrictController::class);
    Route::post('village/{district}', VillageController::class);

    // ROUTE EXTENDED
    Route::group(['middleware' => ['role:admin']], __DIR__.'/admin.php');
    Route::group(['middleware' => ['role:pengguna']], __DIR__.'/pengguna.php');
    Route::group(['middleware' => ['role:kader']], __DIR__.'/kader.php');
    
});
