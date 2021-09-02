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
        ->where('level','2')
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
}
