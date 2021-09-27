<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ManajemenController;

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

Route::get('/login', function () {
    return view('login');
});

//Login And Register
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');

Route::post('/tambah/user',[UserController::class,'tambah_user']);

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
    Route::get('/tanggapan-v/{id}',[UserController::class,'v_tanggapan1']);
    Route::post('/laporan/puas/{id}',[UserController::class,'laporan_puas']);
    Route::post('/laporan/kurang/{id}',[UserController::class,'laporan_kurang']);


});
});

//Route Admin
Route::group(['middleware' => ['auth:user']],function(){
Route::group(['middleware' => ['cek_login:2']],function(){
    Route::get('/',[AdminController::class,'home'])->name('home');
    Route::get('/laporan/masuk',[LaporanController::class,'v_lap_masuk'])->name('masuk');
    Route::get('/laporan/proses',[LaporanController::class,'v_lap_proses'])->name('proses');
    Route::get('/laporan/selesai',[LaporanController::class,'v_lap_selesai'])->name('selesai');
    Route::post('/laporan/update/{id}',[LaporanController::class,'update_laporan']);
    Route::post('/laporan/tolak/{id}',[AdminController::class,'tolak_laporan']);
    Route::get('/admin/tulis-laporan',[AdminController::class,'v_tulis']);
    Route::post('/admin/simpan/laporan',[AdminController::class,'simpan_laporan']);


});
});

//Route Manajemen
Route::group(['middleware' => ['auth:user']],function(){
Route::group(['middleware' => ['cek_login:3']],function(){
    Route::get('/manajemen',[ManajemenController::class,'home'])->name('manajemen');
    Route::get('/manajemen/laporan/masuk',[LaporanController::class,'v_lap_masuk'])->name('m_masuk');
    Route::get('/manajemen/laporan/selesai',[LaporanController::class,'v_lap_selesai'])->name('m_selesai');
    Route::get('/manajemen/laporan/investigasi',[LaporanController::class,'v_lap_proses'])->name('m_investigasi');
    Route::get('/manajemen/tanggapan/masuk',[ManajemenController::Class,'v_tanggapan'])->name('m_tanggapan');
    Route::post('/manajemen/verifikasi/tanggapan/{id}',[LaporanController::Class,'kirim_tanggapan']);
    Route::post('/manajemen/verifikasi/tanggapan/kembalikan/{id}',[LaporanController::Class,'kembalikan_tanggapan']);
    Route::post('/manajemen/update/laporan/{id}',[LaporanController::Class,'update_laporan']);
    Route::post('/manajemen/update/{id}',[LaporanController::Class,'ubah_laporan_inv']);
    Route::post('/manajemen/laporan/tanggapi',[LaporanController::Class,'tanggapi']);
    Route::post('/manajemen/laporan/selesaikan/{id}',[ManajemenController::Class,'update_investigasi']);


    
});
});

//Unit
Route::group(['middleware' => ['auth:user']],function(){
Route::group(['middleware' => ['cek_login:4']],function(){
    Route::get('/unit',[UnitController::class,'home'])->name('unit');
    Route::get('/unit/laporan/masuk',[LaporanController::class,'v_lap_masuk'])->name('u_masuk');
    Route::get('/unit/laporan/selesai',[LaporanController::class,'v_lap_selesai'])->name('u_selesai');
    Route::post('/unit/laporan/selesaikan/{id}',[LaporanController::class,'update_laporan']);
    Route::post('/unit/laporan/tanggapi',[LaporanController::class,'tanggapi']);
    Route::get('/unit/tanggapan/ditolak',[UnitController::class,'tanggapan_ditolak'])->name('u_tanggapan');
    Route::post('/unit/laporan/revisi/tanggapan/{id}',[LaporanController::class,'perbaiki_tanggapan']);
    Route::get('/unit/tanggapan/sukses/{id}',[LaporanController::class,'suksesTanggapan']);
    Route::get('/unit/tanggapan/tolak/{id}',[LaporanController::class,'v_tanggapan_tolak']);

    
});
});

//Route Administrator
Route::group(['middleware' => ['auth:user']],function(){
Route::group(['middleware' => ['cek_login:99']],function(){
    Route::get('/administrator',[AdministratorController::class,'home'])->name('administrator');
    Route::get('/administrator/data/admin',[AdministratorController::class,'v_data_admin'])->name('adminis_admin');
    Route::get('/administrator/data/unit',[AdministratorController::class,'v_data_unit'])->name('v_unit');
    Route::get('/administrator/data/manajemen',[AdministratorController::class,'v_data_manajemen'])->name('v_manajemen');
    Route::get('/administrator/data/divisi',[AdministratorController::class,'v_data_divisi'])->name('v_divisi');
    Route::get('/administrator/laporan/masuk',[AdministratorController::class,'v_laporan_masuk']);
    Route::get('/administrator/laporan/proses',[AdministratorController::class,'v_laporan_proses']);
    Route::get('/administrator/laporan/selesai',[AdministratorController::class,'v_laporan_selesai']);
    Route::get('/administrator/laporan/ditolak',[AdministratorController::class,'v_laporan_ditolak']);
    Route::post('/administrator/tambah/admin',[AdministratorController::class,'tambah_admin']);
    Route::post('/administrator/tambah/unit',[AdministratorController::class,'tambah_unit']);
    Route::post('/administrator/tambah/manajemen',[AdministratorController::class,'tambah_manjemen']);
    Route::post('/administrator/tambah/divisi',[AdministratorController::class,'tambah_divisi']);
    Route::post('/administrator/update/admin/{id}',[AdministratorController::class,'update_admin']);
    Route::post('/administrator/update/password/{id}',[AdministratorController::class,'update_password']);
    Route::get('/tanggapan/petugas/{id}',[AdministratorController::class,'v_tanggapan']);
    Route::get('/cetak/laporan/',[AdministratorController::class,'cetak']);
    Route::get('/cetak/laporan/selesai',[AdministratorController::class,'cetak_selesai']);
    Route::get('/laporan/hapus-laporan/{id}',[AdministratorController::class,'hapus']);
    Route::get('/laporan/hapus-laporan',[AdministratorController::class,'hapus_laporan'])->name('v_hapus');
    Route::get('/administrator/hapus-laporan-total',[AdministratorController::class,'hapus_laporan_total']);
    Route::get('/administrator/hapus-divisi/{id}',[AdministratorController::class,'hapus_divisi']);
    
    Route::get('/cetak/laporan/tgl/{tglawal}/{tglakhir}',[AdministratorController::class,'cetakPerTanggal']);
    Route::get('/cetak/laporan/selesai/tgl/{tglawal}/{tglakhir}/{respon}',[AdministratorController::class,'cetakPerTanggalSelesai']);

});
});
    