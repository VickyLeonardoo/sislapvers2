<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;

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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/laporan/masuk', function () {
//     return view('v_lap_masuk');
// });

Route::get('/login', function () {
    return view('login');
});

//Proses Login
Route::post('/proses_login',[AuthController::class,'proses_login']);




//Route Pelapor
Route::group(['middleware' => ['auth:pelapor']],function(){
Route::group(['middleware' => ['cek_login:999']],function(){
    Route::get('/lapor',[UserController::class,'home'])->name('user');
    Route::get('/daftar/laporan',[UserController::class,'v_laporan'])->name('v_laporan');
    Route::post('/simpan/laporan',[LaporanController::class,'simpan_laporan']);

});
});

//Route Admin
Route::group(['middleware' => ['auth:user']],function(){
Route::group(['middleware' => ['cek_login:2']],function(){
    Route::get('/',[AdminController::class,'home'])->name('home');
    Route::get('/laporan/masuk',[AdminController::class,'v_lap_masuk'])->name('masuk');
    Route::get('/laporan/proses',[AdminController::class,'v_lap_proses'])->name('proses');
    Route::get('/laporan/selesai',[AdminController::class,'v_lap_selesai'])->name('selesai');
});
});
