<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KaryawanController;
use App\Http\Controllers\Api\PostinganController;

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

Route::post('login', [AuthController::class, 'login']);
Route::post('check_token', [AuthController::class, 'check_token'])->name('check_token');
Route::get('/show-qrcode/{id}',  [KaryawanController::class, 'show_qr']);

Route::group(['middleware' => 'jwt.verify'], function () {
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/check-status', [AuthController::class, 'me']);

    Route::group(['prefix' => 'karyawan'], function () {
        Route::post('/',  [KaryawanController::class, 'store']);
        Route::get('/view',  [KaryawanController::class, 'show']);
        Route::post('/delete/{id}',  [KaryawanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'postingan'], function () {
        Route::post('/',  [PostinganController::class, 'store']);
        Route::get('/show',  [PostinganController::class, 'show']);
        Route::get('/show/{id}',  [PostinganController::class, 'show_id']);
        Route::post('/update/{id}',  [PostinganController::class, 'update']);
        Route::delete('/delete/{id}',  [PostinganController::class, 'destroy']);
    });
});
