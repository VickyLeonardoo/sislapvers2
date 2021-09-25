<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\AdministratorModel;
use App\Models\UnitModel;
use App\Models\LaporanModel;
use App\Models\TanggapanModel;


class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->AdministratorModel = new AdministratorModel;
        $this->UnitModel = new UnitModel;
        $this->LaporanModel = new LaporanModel;
        $this->TanggapanModel = new TanggapanModel;
    }
    public function home()
    {
        $admin = DB::table('users')->where('level', '2')->count();
        $unit = DB::table('users')->where('level', '4')->count();
        $manajemen = DB::table('users')->where('level', '3')->count();
        $divisi = DB::table('unit')->count();
        
        $data = [
            'div' => $this->UnitModel->v_unit(),
        ];
        $masuk = DB::table('pengaduan')->where('status','1')->count();
        $selesai = DB::table('pengaduan')->where('status','3')->where('respon','1')->count();
        $respon_tk = DB::table('pengaduan')->where('status','3')->where('respon','2')->count();
        $proses = DB::table('pengaduan')->where('status','2')->count();
        $tolak = DB::table('pengaduan')->where('status','66')->count();
        $total = DB::table('pengaduan')
        ->wherein('status',[1,3,2,66])
        ->count();

        return view('administrator.home',$data,compact('admin','unit','manajemen','divisi','masuk','proses','selesai','respon_tk','tolak','total'));
    }
    
    public function v_data_admin()
    {
        $data = [
            'admin' => $this->AdministratorModel->v_data_admin(),
        ];
        return view('administrator.v_admin', $data);
    }

    public function v_data_unit()
    {
        $data = [
            'admin' => $this->AdministratorModel->v_data_unit(),
        ];
        return view('administrator.v_unit', $data);
    }

    public function v_data_manajemen()
    {
        $data = [
            'admin' => $this->AdministratorModel->v_data_manajemen(),
        ];
        return view('administrator.v_manajemen', $data);
    }
    
    public function v_data_divisi()
    {
        $data = [
            'admin' => $this->AdministratorModel->v_data_divisi(),
        ];
        return view('administrator.v_divisi', $data);
    }

    public function tambah_admin()
    {
        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'email' => Request()->email,
            'username' => Request()->username,
            'password' => Hash::make(request()->password),
            'id_divisi' => 9999,
            'level' => 2,
        ];
        $this->AdministratorModel->tambah_admin($data);       
        return redirect()->route('administrator')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }

    public function tambah_unit()
    {
        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'email' => Request()->email,
            'username' => Request()->username,
            'password' => Hash::make(request()->password),
            'id_divisi' => Request()->unit,
            'level' => 2,
        ];
        $this->AdministratorModel->tambah_admin($data);       
        return redirect()->route('administrator')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }

    public function tambah_manjemen()
    {
        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'email' => Request()->email,
            'username' => Request()->username,
            'password' => Hash::make(request()->password),
            'id_divisi' => 9999,
            'level' => 3,
        ];
        $this->AdministratorModel->tambah_manajemen($data);       
        return redirect()->route('administrator')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }

    public function tambah_divisi()
    {
        $data = [
            'kode' => Request()->kode,
            'nama_div' => Request()->nama,
        ];
        $this->AdministratorModel->tambah_divisi($data);       
        return redirect()->route('administrator')->with('berhasil','Kamu Berhasil Mendaftar,Silahkan Login!');
    }

    public function v_laporan_masuk()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_lap_masuk(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('administrator.v_laporan_masuk',$data);
    }

    public function v_laporan_proses()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_lap_proses(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('administrator.v_laporan_proses',$data);
    }

    public function v_laporan_selesai()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_lap_selesai(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('administrator.v_laporan_selesai',$data);
    }

    public function v_laporan_ditolak()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_laporan_ditolak(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('administrator.v_laporan_ditolak',$data);
    }

    public function update_admin($id)
    {
        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'username' => Request()->username,
            'email' => Request()->email,
        ];
        $this->AdministratorModel->update_data($id,$data);
        return redirect()->route('adminis_admin');
    }

    public function update_password($id)
    {
        Request()->validate([
            'password' => 'required_with:password_confirmation|same:password_confirmation',
        ],[
            'password.required' =>  'Wajib Diisi',
            'password.min' => 'Minimal 8 Karakter',
            'password.same' => 'Password Tidak Sama',
        ]);

        $data = [
            'password' => Hash::make(request()->password),
        ];
        $this->AdministratorModel->ubah_password($id,$data);
        return redirect()->route('adminis_admin');
    }

    public function v_tanggapan($id)
    {
        $data = [
            'tanggapan' => $this->TanggapanModel->v_tanggapan($id),
        ];
        return view('administrator.v_tanggapan',$data);
    }

    public function cetak()
    {
        return view('administrator.cetak');
    }

    public function cetak_selesai()
    {
        return view('administrator.cetak_selesai');
    }

    public function cetakPerTanggal($tglawal, $tglakhir)
    {
        //  dd("Tanggal Awal :" .$tglawal, "Tanggal Akhir:".$tglakhir);
        $cetak = DB::table('pengaduan')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->whereBetween('tgl_laporan',[$tglawal, $tglakhir])
        ->get();
        return view('administrator.cetak_pertanggal', compact('cetak'));
        
    }

    public function cetakPerTanggalSelesai($tglawal, $tglakhir, $respon)
    {
        //  dd("Tanggal Awal :" .$tglawal, "Tanggal Akhir:".$tglakhir);
        $cetak = DB::table('pengaduan')
        ->join('pelapor','pengaduan.id_pelapor','=','pelapor.id')
        ->where('status',3)
        ->where('respon',[$respon])
        ->whereBetween('tgl_laporan',[$tglawal, $tglakhir])->get();
        return view('administrator.cetak_pertanggal', compact('cetak'));
        
    }

    public function hapus_laporan()
    {
        $data = [
            'laporan' => $this->AdministratorModel->v_laporan_total()
        ];
        return view('administrator.v_hapus',$data);
    }

    public function hapus($id)
    {
        $laporan = $this->AdministratorModel->detail_hapus($id);
        if ($laporan->foto <> "") {
            unlink(public_path('file_laporan').'/'.$laporan->foto);
            unlink(public_path('file_laporan').'/'.$laporan->foto2);
            unlink(public_path('file_laporan').'/'.$laporan->foto3);
        }
        $this->AdministratorModel->hapus_laporan($id);
        return redirect()->route('v_hapus')->with('pesan','Laporan Berhasil Dihapus!');
    }
    
}
