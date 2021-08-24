<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\AdminModel;
use App\Models\LaporanModel;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->LaporanModel = new LaporanModel();

    }

    public function home()
    {
        $masuk = DB::table('pengaduan')->where('status','1')->count();
        $proses = DB::table('pengaduan')->where('status','2')->count();
        $selesai = DB::table('pengaduan')->where('status','3')->count();
        return view('admin.home', compact('masuk','proses','selesai'));
    }

    public function v_lap_masuk()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_lap_masuk(),
            'unit' => $this->LaporanModel->v_unit(),
        ];

        
        return view('admin.v_lap_masuk',$data);
    }

    public function v_lap_proses()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_lap_proses()
        ];
        return view('admin.v_lap_proses',$data);
    }

    public function v_lap_selesai()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_lap_selesai()
        ];
        return view('admin.v_lap_selesai',$data);
    }

    public function detail()
    {
        
    }
}
