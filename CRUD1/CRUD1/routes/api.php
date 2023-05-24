<?php

use App\Http\Controllers\backend\ApiPendidikanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Mengambil data pengguna saat sudah terautentikasi
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Grup rute API dengan namespace kosong
Route::group(['namespace' => ''], function() {
    // Mendefinisikan rute API untuk mendapatkan semua data pendidikan
    Route::get('api_pendidikan', [ApiPendidikanController::class, 'getAll']);
    // Mendefinisikan rute API untuk mendapatkan data pendidikan berdasarkan ID
    Route::get('api_pendidikan/{id}', [ApiPendidikanController::class, 'getPen']);
    // Mendefinisikan rute API untuk membuat data pendidikan baru
    Route::post('api_pendidikan', [ApiPendidikanController::class, 'createPen']);
    // Mendefinisikan rute API untuk memperbarui data pendidikan berdasarkan ID
    Route::put('api_pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);
     // Mendefinisikan rute API untuk menghapus data pendidikan berdasarkan ID
    Route::delete('api_pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);
});
