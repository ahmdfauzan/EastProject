<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RealisasiController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('loginCheck', 'App\Http\Controllers\Auth\LoginController@loginWithToken');

Route::post('/loginCheck', 'App\Http\Controllers\Auth\LoginController@loginWithToken')->name('loginWithToken');

Route::resource('realisasi', RealisasiController::class)->only(['index', 'create', 'store']);
