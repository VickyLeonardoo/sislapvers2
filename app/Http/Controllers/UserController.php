<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitModel;
use App\Models\LaporanModel;


class UserController extends Controller
{
    public function __construct()
    {
        $this->UnitModel = new UnitModel;
        $this->LaporanModel = new LaporanModel;
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
    
}
