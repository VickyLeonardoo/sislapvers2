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
        return DB::table('pengaduan')->where('status', '1')->get();
    }

    public function v_lap_proses()
    {
        return DB::table('pengaduan')->where('status', '2')->get();
    }

    public function v_unit()
    {
        return DB::table('unit')->get();
    }

    public function v_lap_selesai()
    {
        return DB::table('pengaduan')->where('status', '3')->get();
    }

    public function v_laporan()
    {
        return DB::table('pengaduan')
        ->where('id_pelapor', Auth::guard('pelapor')->user()->id)
        ->get();
    }
    // public function detail()
    // {
        
    // }

    public function tambahData($data)
    {
        DB::table('pengaduan')->insert($data);
    }
}
