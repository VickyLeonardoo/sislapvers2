<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AdministratorModel extends Model
{
    public function v_data_admin()
    {
        return DB::table('users')
        ->whereIn('level',[99,2])
        ->get();
    }

    public function v_data_unit()
    {
        return DB::table('users')
        ->leftJoin('unit','users.id_divisi','=','unit.id_divisi')
        ->where('level','4')
        ->get();
    }

    public function v_data_manajemen()
    {
        return DB::table('users')
        ->where('level','3')
        ->get();
    }

    public function v_data_divisi()
    {
        return DB::table('unit')->get();
    }

    public function tambah_admin($data)
    {
        DB::table('users')->insert($data);
    }

    public function tambah_manajemen($data)
    {
        DB::table('users')->insert($data);
    }

    public function tambah_divisi($data)
    {
        DB::table('unit')->insert($data);
    }

    public function update_data($id,$data)
    {
        DB::table('users')->where('id_petugas',$id)->update($data);
    }

    public function ubah_password($id,$data)
    {
        DB::table('users')->where('id_petugas',$id)->update($data);
    }

    public function v_laporan_total()
    {
        return DB::table('pengaduan')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->get();
    }

    public function hapus_laporan($id)
    {
        DB::table('pengaduan')->where('id_pengaduan',$id)->delete();
    }

    public function detail_hapus($id)
    {
        return DB::table('pengaduan')->where('id_pengaduan', $id)->first();
    }

    public function v_laporan_total1()
    {
       return DB::table('pengaduan')
        ->first();
    }

    public function hapus_laporan_total()
    {
         DB::table('pengaduan')->where('status','1')->delete();
    }

    public function detail_divisi($id)
    {
        return DB::table('unit')->where('id_divisi', $id)->first();
    }

    public function hapus_divisi($id)
    {
        DB::table('unit')->where('id_divisi', $id)->delete();
    }

    public function v_lap_total()
    {
        return DB::table('pengaduan')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->get();
    }
}
