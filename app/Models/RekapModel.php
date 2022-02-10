<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class RekapModel extends Model
{
    use HasFactory;

    public function laporanMasuk(){
        return DB::table('pengaduan')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->select('pengaduan.*','unit.*','pelapor.*')
            ->where('pengaduan.status', '1')
            ->get();
    }

    public function laporanProses(){
        return DB::table('pengaduan')
            ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
            ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
            ->where('pengaduan.status','2')
            ->get();
    }
    
    public function laporanTolak(){
        return DB::table('pengaduan')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->where('status','66')
        ->get();
    }

    public function laporanPuas(){
        return DB::table('pengaduan')
        ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->where('pengaduan.status', '3')
        ->where('pengaduan.id_divisi', Auth::guard('user')->user()->id_divisi)
        ->where('pengaduan.respon','1')
        ->get();
    }

    public function laporanTp(){
        return DB::table('pengaduan')
        ->join('unit','pengaduan.id_divisi','=','unit.id_divisi')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->where('pengaduan.status', '3')
        ->where('pengaduan.respon','2')
        ->get();
    }

    public function laporanTotal(){
        return DB::table('pengaduan')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->get();
    }

    public function rekap(){
        DB:: table('pengaduan')
        ->where('status','1')
        ->count();
    }


}
