<?php

use App\Http\Controllers\backend\PendidikanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\backend\PengalamanKerjaController;
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

//Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => ''], function (){
    // Resource route untuk DashboardController
    Route::resource('dashboard', DashboardController::class);
    // Resource route untuk PendidikanController
    Route::resource('pendidikan', PendidikanController::class);
});

// Resource route untuk PengalamanKerjaController
Route::resource('pengalaman_kerja', PengalamanKerjaController::class);