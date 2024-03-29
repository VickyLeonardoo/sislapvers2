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
        ->where('id_divisi',Auth::guard('user')->user()->id_divisi)
        ->where('status','2')
        ->where('investigasi','2')
        ->count();


        // $selesai = DB::table('pengaduan')
        // ->where('id_divisi',Auth::guard('user')->user()->id_divisi)
        // ->where('status','3')
        // ->where('investigasi','2')
        // ->count();
        
        $masukTotal = DB::table('pengaduan')->where('status', '1')->count();
        // $selesai = DB::table('pengaduan')->where('status', '3')->where('respon', '1')->count();
        // $respon_tk = DB::table('pengaduan')->where('status', '3')->where('respon', '2')->count();
        $selesai = DB::table('pengaduan')->where('status', '3')->count();
        $proses_total = DB::table('pengaduan')->where('status', '2')->count();
        $tolak = DB::table('pengaduan')->where('status', '66')->count();
        $total = DB::table('pengaduan')
            ->wherein('status', [1, 3, 2, 66])
            ->count();

        return view('unit.home',compact('masuk','selesai','total','masukTotal','proses_total','selesai','tolak'));
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
        return view('unit.v_tanggapan_tolak',$data)->with('pesan','Tanggapan Berhasil Dikirim,Menunggu Verifikasi Manajemen');
    }

    public function tanggapan_pelapor()
    {
        $data = [
            'laporan' => $this->TanggapanModel->v_tanggapan_pelapor(),
            'unit' =>$this->UnitModel->v_unit(),
        ];
        return view('unit.v_tanggapan_pelapor',$data)->with('pesan','Tanggapan Berhasil Dikirim,Menunggu Verifikasi Manajemen');

    }

    
}
