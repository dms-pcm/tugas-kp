<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KaryawanController;

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
    return view('login');
});

Route::get('/dashboard/{id}', function ($id) {
    return view('dashboard.index',[
        'user_id' => $id
    ]);
});

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

Route::get('/unggah', function () {
    return view('dashboard.unggah');
});

Route::get('/qrcode/{id}', [KaryawanController::class, 'show_qr']);

// Route::prefix('post')->group(function () {
//     Route::get('/{id}', function ($id) {
//         return view('dashboard.post',['id'=>$id]);
//     });
// });
Route::get('/post/{id}', function ($id) {
    return view('dashboard.post',[
        'user_id' => $id
    ]);
});