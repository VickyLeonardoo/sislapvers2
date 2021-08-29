<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class LaporanModel extends Model
{

   public function v_lap_masuk()
    {
        if (Auth::guard('user')->user()->level == 2) {
            return DB::table('pengaduan')->where('status', '1')->get();
        }elseif (Auth::guard('user')->user()->level == 4) {
            return DB::table('pengaduan')
            ->where('status','2')
            ->where('investigasi','2')
            ->where('id_divisi', Auth::guard('user')->user()->kode)
            ->get();
        }elseif(Auth::guard('user')->user()->level == 3){
            return DB::table('pengaduan')
            ->where('status','2')
            ->where('investigasi','3')
            ->get();
        }elseif(Auth::guard('user')->user()->level == 99){
            return DB::table('pengaduan')
            ->where('status','1')
            ->get();
        }
        
    }

    public function v_lap_proses()
    {
        if (Auth::guard('user')->user()->level == 2) {
            return DB::table('pengaduan')->where('status', '2')->get();
        }
        elseif (Auth::guard('user')->user()->level == 3){
            return DB::table('pengaduan')
            ->where('status','2')
            ->where('investigasi','1')
            ->get();
        }
        elseif (Auth::guard('user')->user()->level == 4){
            return DB::table('pengaduan')
            ->where('status','2')
            ->where('investigasi','1')
            ->get();
        }
        elseif (Auth::guard('user')->user()->level == 99){
            return DB::table('pengaduan')
            ->where('status','2')
            ->get();
        }
       
    }

    public function v_unit()
    {
        return DB::table('unit')->get();
    }

    public function v_lap_selesai()
    {
        if (Auth::guard('user')->user()->level == 2) {
            return DB::table('pengaduan')->where('status', '3')->get();
        }
        elseif(Auth::guard('user')->user()->level == 4){
            return DB::table('pengaduan')
            ->where('status', '3')
            ->where('investigasi','2')
            ->where('id_divisi', Auth::guard('user')->user()->kode)
            ->get();
        }
        elseif(Auth::guard('user')->user()->level == 99){
            return DB::table('pengaduan')
            ->where('status', '4')
            ->get();
        }
    }

    public function v_laporan_ditolak(){
        return DB::table('pengaduan')->where('status','66')->get();
    }

    public function v_laporan()
    {
        return DB::table('pengaduan')
        ->where('id_pelapor', Auth::guard('pelapor')->user()->id)
        ->get();
    }

    public function tambahData($data)
    {
        DB::table('pengaduan')->insert($data);
    }

    public function ubahData($id,$data)
    {
        DB::table('pengaduan')->where('id_pengaduan',$id)->update($data);
    }
}
