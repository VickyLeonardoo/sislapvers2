<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitModel;
use App\Models\LaporanModel;
use App\Models\TanggapanModel;


class UserController extends Controller
{
    public function __construct()
    {
        $this->UnitModel = new UnitModel;
        $this->LaporanModel = new LaporanModel;
        $this->TanggapanModel = new TanggapanModel;

    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function home()
    {
        $data = [
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('user.home',$data);
    }

    public function v_laporan()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_laporan(),
        ];
        return view('user.v_laporan',$data);
    }

    public function v_tanggapan($id)
    {
        $data = [
            'tanggapan' => $this->TanggapanModel->v_tanggapan($id),
        ];
        return view('user.v_tanggapan',$data);
    }
    
}
