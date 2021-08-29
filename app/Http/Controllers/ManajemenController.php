<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\LaporanModel;
use App\Models\TanggapanModel;
use App\Models\UnitModel;


class ManajemenController extends Controller
{
    public function __construct()
    {
        $this->LaporanModel = new LaporanModel;
        $this->TanggapanModel = new TanggapanModel;
        $this->UnitModel = new UnitModel;
    }

    public function home()
    {
        $masuk = DB::table('pengaduan')
        ->where('status','2')
        ->where('investigasi','3')
        ->count();
        $selesai = DB::table('pengaduan')
        ->where('status','3')
        ->where('investigasi','1')
        ->count();
        $investigasi = DB::table('pengaduan')
        ->where('status','2')
        ->where('investigasi','1')
        ->count();
        $tanggapan = DB::table('tanggapan')
        ->where('status_tanggapan','1')
        ->count();

        return view('manajemen.home',compact('masuk','selesai','investigasi','tanggapan'));
    }

    public function v_tanggapan()
    {
        $data = [
            'laporan' =>$this->TanggapanModel->v_tanggapan(),
            'unit' =>$this->UnitModel->v_unit(),
        ];
        return view('manajemen.v_tanggapan',$data);
    }

    
}

