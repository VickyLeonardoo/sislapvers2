<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\LaporanModel;
use App\Models\TanggapanModel;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Mail\TanggapanMail;
use App\Models\RekapModel;


class RekapController extends Controller
{
    public function __construct()
    {
        $this->LaporanModel = new LaporanModel;
        $this->TanggapanModel = new TanggapanModel;
        $this->RekapModel = new RekapModel;
    }

    public function laporanMasuk(){
        $data = [
            'laporan' => $this->RekapModel->laporanMasuk(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('unit.rekap_lap_masuk',$data);
    }

    public function laporanProses(){
        $data = [
            'laporan' => $this->RekapModel->laporanProses(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('unit.rekap_lap_proses',$data);

    }
    
    public function laporanTolak(){
        $data = [
            'laporan' => $this->RekapModel->laporanTolak(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('unit.rekap_lap_tolak',$data);

    }

    public function laporanPuas(){
        $data = [
            'laporan' => $this->RekapModel->laporanPuas(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('unit.rekap_lap_puas',$data);

    }

    public function laporanTp(){
        $data = [
            'laporan' => $this->RekapModel->laporanTp(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('unit.rekap_lap_tp',$data);

    }

    public function laporanTotal(){
        $data = [
            'laporan' => $this->RekapModel->laporanTotal(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('unit.rekap_lap_total',$data);

    }
}
