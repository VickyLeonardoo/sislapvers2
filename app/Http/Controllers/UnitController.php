<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\UnitModel;
use App\Models\LaporanModel;
use App\Models\TanggapanModel;
use Auth;
use Carbon\Carbon;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->UnitModel = new UnitModel;
        $this->LaporanModel = new LaporanModel;
        $this->TanggapanModel = new TanggapanModel;
    }

    public function home()
    {
        $masuk = DB::table('pengaduan')
        ->where('id_divisi',Auth::guard('user')->user()->kode)
        ->where('status','2')
        ->where('investigasi','2')
        ->count();
        $selesai = DB::table('pengaduan')
        ->where('id_divisi',Auth::guard('user')->user()->kode)
        ->where('status','3')
        ->where('investigasi','2')
        ->count();
        
        return view('unit.home',compact('masuk','selesai'));
    }

    public function v_lap_masuk()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_lap_masuk(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('unit.v_lap_masuk',$data);
    }

    public function tanggapan_ditolak()
    {
        $data = [
            'laporan' => $this->TanggapanModel->v_tanggapan_tolak(),
            'unit' =>$this->UnitModel->v_unit(),
        ];
        return view('unit.v_tanggapan_tolak',$data);
    }

    
}
