<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
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

//Login And Register
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');


//Proses Login
Route::post('/proses_login',[AuthController::class,'proses_login']);
Route::get('/logout',[AuthController::class,'logout']);




//Route Pelapor
Route::group(['middleware' => ['auth:pelapor']],function(){
Route::group(['middleware' => ['cek_login:999']],function(){
    Route::get('/lapor',[UserController::class,'home'])->name('user');
    Route::get('/daftar/laporan',[UserController::class,'v_laporan'])->name('v_laporan');
    Route::post('/simpan/laporan',[LaporanController::class,'simpan_laporan']);
    Route::get('/tanggapan/{id}',[UserController::class,'v_tanggapan']);

});
});

//Route Admin
Route::group(['middleware' => ['auth:user']],function(){
Route::group(['middleware' => ['cek_login:2']],function(){
    Route::get('/',[AdminController::class,'home'])->name('home');
    Route::get('/laporan/masuk',[AdminController::class,'v_lap_masuk'])->name('masuk');
    Route::get('/laporan/proses',[AdminController::class,'v_lap_proses'])->name('proses');
    Route::get('/laporan/selesai',[AdminController::class,'v_lap_selesai'])->name('selesai');
    Route::post('/laporan/update/{id}',[LaporanController::class,'update_laporan']);

});
});

//Route Administrator
Route::group(['middleware' => ['auth:user']],function(){
Route::group(['middleware' => ['cek_login:99']],function(){
    Route::get('/administrator',[AdministratorController::class,'home'])->name('administrator');
    Route::get('/administrator/data/admin',[AdministratorController::class,'v_data_admin']);
    Route::get('/administrator/data/unit',[AdministratorController::class,'v_data_unit']);
    Route::get('/administrator/data/manajemen',[AdministratorController::class,'v_data_manajemen']);
    Route::get('/administrator/data/divisi',[AdministratorController::class,'v_data_divisi']);
    Route::post('/administrator/tambah/admin',[AdministratorController::class,'tambah_admin']);
    Route::post('/administrator/tambah/unit',[AdministratorController::class,'tambah_unit']);
    Route::post('/administrator/tambah/manajemen',[AdministratorController::class,'tambah_manjemen']);
    Route::post('/administrator/tambah/divisi',[AdministratorController::class,'tambah_divisi']);
        
});
});
    