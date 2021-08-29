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
   
    public function tolak_laporan($id)
    {
        $data = [
            'status' => 66,
            'alasan' => Request()->alasan,
        ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('masuk');
    }
}
