<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitModel;
use App\Models\LaporanModel;
use App\Models\TanggapanModel;
use App\Models\MasyarakatModel;
use Hash;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UnitModel = new UnitModel;
        $this->LaporanModel = new LaporanModel;
        $this->TanggapanModel = new TanggapanModel;
        $this->MasyarakatModel = new MasyarakatModel;
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
            'unit' => $this->LaporanModel->v_unit(),
        ];

    
        
        return view('user.v_laporan',$data);
    }

    public function v_tanggapan($id)
    {
        if (!$this->LaporanModel->detailData($id)) {
            abort(404);
         }
        
        $data = [
            'tanggapan' => $this->TanggapanModel->v_tanggapan($id),
        ];
        return view('user.v_tanggapan',$data);
    }

    public function laporan_puas($id)
    {
        $data = [
            'respon' => 1,
            'status' => 3,
        ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('v_laporan');
    }

    public function laporan_kurang($id)
    {
        $data = [
            'respon' => 2,
            'status' => 3,
        ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('user')->with('pesan','Jika Tidak Puas Silahkan Buat Laporan Baru');
    }

    public function tambah_user()
    {
        Request()->validate([
            'nama' => 'required',
            'no_hp' => 'required|unique:pelapor,no_hp',
            'email' => 'required|unique:pelapor,email',
            'username' => 'required|unique:pelapor,username',
            'password' => 'required|required_with:password_confirmation|same:password_confirmation|min:8'
        ],[
            'nama.required' => 'Nama Wajib Diisi',
            'no_hp.unique' => 'Nomor HP sudah ada,silahkan ganti',
            'no_hp.required' => 'Nomor HP Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email Sudah Terdaftar,Silahkan Ganti',
            'username.required' => 'Username Wajib Diisi',
            'username.unique' => 'Username sudah ada,silahkan ganti',
            'password.required' => 'Password Wajib Diisi',
            'password.same' => 'Password Tidak Sama',
        ]);

        $data = [
            'nama' => Request()->nama,
            'no_hp' => Request()->no_hp,
            'email' => Request()->email,
            'username' => Request()->username,
            'password' => Hash::make(request()->password),
            'level' => 999,
        ];
        
        // event(new Registered($pelapor));
        $this->MasyarakatModel->tambah($data);
        return redirect()->route('login')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }

    public function v_tanggapan1()
    {
        return view('user.v_tanggapan_v');
    }

    public function tanggapi_tanggapan($id)
    {
        $data = [
            'id_pengaduan' => Request()->id_pengaduan,
            'id_tanggapan' => Request()->id_tanggapan,
            'tanggapan_user' => Request()->tanggapan,
            'tgl_tanggapan_user' => Carbon::now()->format('Y-m-d'),
        ];

        $this->TanggapanModel->tanggapi_tanggapan($data);
        return redirect()->route('v_laporan')->with('berhasil','Kamu Berhasil Mengirim Tanggapan,Silahkan Tunggu Konfirmasi Petugas');

    }
}
