<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

require __DIR__.'/auth.php';

Route::group(['middleware'=> ['auth']], function () {

    // Dashboard Default
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Location
    Route::post('city/{province}', CityController::class);
    Route::post('district/{city}', DistrictController::class);
    Route::post('village/{district}', VillageController::class);

    // ROUTE EXTENDED
    Route::group(['middleware' => ['role:admin']], __DIR__.'/admin.php');
    Route::group(['middleware' => ['role:pengguna']], __DIR__.'/pengguna.php');
    Route::group(['middleware' => ['role:kader']], __DIR__.'/kader.php');
    
});
