<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class TanggapanModel extends Model
{
    
    // public function v_tanggapan($id)
    // {
    //     return DB::table('tanggapan')
    //     ->where('id_pengaduan', $id)
    //     ->where('status_tanggapan','2')
    //     ->get();
    // } 

    public function tanggapi($data)
    {
        return DB::table('tanggapan')->insert($data);
    }

    public function v_tanggapan($id)
    {
        return DB::table('tanggapan')
        ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
        ->select('tanggapan.*','pengaduan.*')
        ->where('tanggapan.status_tanggapan','4')
        ->where('pengaduan.id_pengaduan',$id)
        ->get();
    }

    public function v_tanggapanM()
    {
        return DB::table('tanggapan')
        ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
        ->select('tanggapan.*','pengaduan.*')
        ->where('tanggapan.status_tanggapan','1')
        ->get();
    }

    public function v_tanggapan_tolak()
    {
        return DB::table('tanggapan')
        ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
        ->join('tktanggapan', 'tanggapan.id_tanggapan', '=' , 'tktanggapan.id_tanggapan')
        ->select('tanggapan.*','pengaduan.*','tktanggapan.*')
        ->where('tanggapan.status_tanggapan','2')
        ->get();
    }

    public function kirim_tanggapan($id,$data)
    {
        DB::table('tanggapan')->where('id_tanggapan',$id)->update($data);
    }

    public function kembalikanTanggapan($data)
    {
        DB::table('tktanggapan')->insert($data);
    }

    public function updateTanggapan($id,$update)
    {
        DB::table('tanggapan')->where('id_tanggapan',$id)->update($update);
    }

    public function tanggapanSukses($id)
   {
      return DB::table('tanggapan')
      ->where('id_pengaduan', $id)
      ->where('status_tanggapan','4')
      ->get();
   }

   public function tanggapan_u_tolak($id)
   {
    return DB::table('tanggapan')
        ->rightJoin('tktanggapan', 'tanggapan.id_tanggapan', '=', 'tktanggapan.id_tanggapan')
        ->select('tanggapan.*','tktanggapan.alasan_tolak')
        ->where('tanggapan.id_pengaduan', $id)
        ->where('tanggapan.status_tanggapan','3')
        ->get();
   }

}
