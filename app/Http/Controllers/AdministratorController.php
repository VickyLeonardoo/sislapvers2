<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\AdministratorModel;
use App\Models\UnitModel;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->AdministratorModel = new AdministratorModel;
        $this->UnitModel = new UnitModel;
    }
    public function home()
    {
        $admin = DB::table('users')->where('level', '2')->count();
        $unit = DB::table('users')->where('level', '4')->count();
        $manajemen = DB::table('users')->where('level', '3')->count();
        $divisi = DB::table('unit')->count();
        
        $data = [
            'div' => $this->UnitModel->v_unit(),
        ];

        return view('administrator.home',$data,compact('admin','unit','manajemen','divisi'));
    }
    
    public function v_data_admin()
    {
        $data = [
            'admin' => $this->AdministratorModel->v_data_admin(),
        ];
        return view('administrator.v_admin', $data);
    }

    public function v_data_unit()
    {
        $data = [
            'admin' => $this->AdministratorModel->v_data_unit(),
        ];
        return view('administrator.v_unit', $data);
    }

    public function v_data_manajemen()
    {
        $data = [
            'admin' => $this->AdministratorModel->v_data_manajemen(),
        ];
        return view('administrator.v_manajemen', $data);
    }
    
    public function v_data_divisi()
    {
        $data = [
            'admin' => $this->AdministratorModel->v_data_divisi(),
        ];
        return view('administrator.v_divisi', $data);
    }

    public function tambah_admin()
    {
        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'email' => Request()->email,
            'username' => Request()->username,
            'password' => Hash::make(request()->password),
            'id_divisi' => 9999,
            'level' => 2,
        ];
        $this->AdministratorModel->tambah_admin($data);       
        return redirect()->route('administrator')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }

    public function tambah_unit()
    {
        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'email' => Request()->email,
            'username' => Request()->username,
            'password' => Hash::make(request()->password),
            'id_divisi' => Request()->unit,
            'level' => 2,
        ];
        $this->AdministratorModel->tambah_admin($data);       
        return redirect()->route('administrator')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }

    public function tambah_manjemen()
    {
        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'email' => Request()->email,
            'username' => Request()->username,
            'password' => Hash::make(request()->password),
            'id_divisi' => 9999,
            'level' => 3,
        ];
        $this->AdministratorModel->tambah_manajemen($data);       
        return redirect()->route('administrator')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }

    public function tambah_divisi()
    {
        $data = [
            'kode' => Request()->kode,
            'nama_div' => Request()->nama,
        ];
        $this->AdministratorModel->tambah_divisi($data);       
        return redirect()->route('administrator')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }
}
