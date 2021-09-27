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
            return DB::table('pengaduan')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->select('pengaduan.*','unit.*','pelapor.*')
            ->where('pengaduan.status', '1')->get();
        }elseif (Auth::guard('user')->user()->level == 4) {
            return DB::table('pengaduan')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->where('status','2')
            ->where('investigasi','2')
            ->where('id_divisi', Auth::guard('user')->user()->id_divisi)
            ->get();
        }elseif(Auth::guard('user')->user()->level == 3){
            return DB::table('pengaduan')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->where('pengaduan.status','2')
            ->where('pengaduan.investigasi','3')
            ->get();
        }elseif(Auth::guard('user')->user()->level == 99){
            return DB::table('pengaduan')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->where('status','1')
            ->get();
        }
        
    }

    public function v_lap_proses()
    {
        if (Auth::guard('user')->user()->level == 2) {
            return DB::table('pengaduan')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->where('status', '2')
            ->get();
        }
        elseif (Auth::guard('user')->user()->level == 3){
            return DB::table('pengaduan')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->where('pengaduan.status','2')
            ->where('pengaduan.investigasi','1')
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
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->where('pengaduan.status','2')
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
            return DB::table('pengaduan')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->where('status', '3')
            ->get();
        }
        elseif(Auth::guard('user')->user()->level == 4){
            return DB::table('pengaduan')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->where('status', '3')
            ->where('investigasi','2')
            ->where('pengaduan.id_divisi', Auth::guard('user')->user()->id_divisi)
            ->get();
        }
        elseif(Auth::guard('user')->user()->level == 3) {
            return DB::table('pengaduan')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->where('status','3')
            ->where('investigasi','1')
            ->get();
        }
        elseif(Auth::guard('user')->user()->level == 99){
            return DB::table('pengaduan')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->where('pengaduan.status', '3')
            ->where('pengaduan.respon','1')
            ->get();
        }
        
    }

    public function v_laporan_ditolak(){
        return DB::table('pengaduan')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->where('status','66')
        ->get();
    }

    public function v_laporan()
    {
        return DB::table('pengaduan')
        ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->where('pengaduan.id_pelapor', Auth::guard('pelapor')->user()->id)
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

    public function detailData($id)
    {
        return DB::table('pengaduan')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->where('pengaduan.id_pengaduan',$id)
        ->where('pengaduan.id_pelapor',Auth::guard('pelapor')->user()->id)
        ->first();
    }
}
