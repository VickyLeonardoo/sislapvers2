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
        ->join('pengaduan','tanggapan.id_pengaduan','=','pengaduan.id_pengaduan')
        ->select('tanggapan.*','pengaduan.*')
        ->where('tanggapan.status_tanggapan','1')
        ->count();

        $masuk_total = DB::table('pengaduan')->where('status','1')->count();
        $selesai_total = DB::table('pengaduan')->where('status','3')->where('respon','1')->count();
        $respon_tk_total = DB::table('pengaduan')->where('status','3')->where('respon','2')->count();
        $proses_total = DB::table('pengaduan')->where('status','2')->count();
        $tolak_total = DB::table('pengaduan')->where('status','66')->count();
        $total = DB::table('pengaduan')
        ->wherein('status',[1,3,2,66])
        ->count();

        return view('manajemen.home',compact('masuk','selesai','investigasi','tanggapan','masuk_total','selesai_total','respon_tk_total','proses_total','tolak_total','total'));
    }

    public function v_tanggapan()
    {
        $data = [
            'laporan' =>$this->TanggapanModel->v_tanggapanm(),
            'unit' =>$this->UnitModel->v_unit(),
        ];
        return view('manajemen.v_tanggapan',$data);
    }

    public function update_investigasi($id)
    {
        $data = [
            'status' => 3,
        ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('m_investigasi');
    }

    public function v_laporan_masuk()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_laporan_masuk(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('manajemen.v_laporan_masuk',$data);

    }

    public function v_laporan_ditolak()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_laporan_ditolak(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('manajemen.v_laporan_ditolak',$data);
    }

    public function v_laporan_proses()
    {
        $data = [
            'laporan' => $this->LaporanModel->laporan_rekap(),
            'unit' => $this->LaporanModel->v_unit(),
        ];

        return view('manajemen.v_laporan_proses',$data);
    }

    public function v_laporan_selesai_puas()
    {
        $data = [
            'laporan' => $this->LaporanModel->laporan_rekap_puas(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('manajemen.v_laporan_puas',$data);
    }

    public function v_laporan_selesai_tp(){
        $data = [
            'laporan' => $this->LaporanModel->v_lap_selesaiTp(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('manajemen.v_laporan_selesai_tp',$data);
    }
    
}

