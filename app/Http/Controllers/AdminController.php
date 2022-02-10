<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\AdminModel;
use App\Models\LaporanModel;
use App\Models\Pengaduan;
use App\Models\AdministratorModel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->LaporanModel = new LaporanModel();
        $this->AdministratorModel = new AdministratorModel();
    }

    public function home()
    {
        $masuk = DB::table('pengaduan')->where('status', '1')->count();
        $proses = DB::table('pengaduan')->where('status', '2')->count();

        $masuk = DB::table('pengaduan')->where('status', '1')->count();
        // $selesai = DB::table('pengaduan')->where('status', '3')->where('respon', '1')->count();
        $respon_tk = DB::table('pengaduan')->where('status', '3')->where('respon', '2')->count();
        $selesai = DB::table('pengaduan')->where('status', '3')->count();
        $proses = DB::table('pengaduan')->where('status', '2')->count();
        $tolak = DB::table('pengaduan')->where('status', '66')->count();
        $total = DB::table('pengaduan')
            ->wherein('status', [1, 3, 2, 66])
            ->count();
        return view('admin.home', compact('masuk', 'proses', 'selesai', 'masuk', 'selesai', 'respon_tk', 'proses', 'tolak', 'total'));
    }

    public function tolak_laporan($id)
    {
        $data = [
            'status' => 66,
            'alasan' => Request()->alasan,
            'status_tanggapan' => 3,
        ];
        $this->LaporanModel->ubahData($id, $data);
        return redirect()->route('masuk');
    }

    public function v_tulis()
    {
        $data = [
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('admin.v_laporan', $data);
    }

    public function simpan_laporan(Request $request)
    {
        Request()->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'isi' => 'required',
            'tgl_kejadian' => 'required',
            'unit' => 'required',
            'tgl_kejadian' => 'required',
        ], [
            'judul.required' => 'Judul Wajib Diisi',
            'lokasi.required' => 'Lokasi Wajib Diisi',
            'isi.required' => 'Isi Wajib Diisi',
            'tgl_kejadian.required' => 'Tanggal Wajib Diisi',
            'unit.required' => 'Unit Wajib Diisi',
        ]);


        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->GetClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'file_laporan/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        Pengaduan::insert([
            'foto' => implode('|', $image),
            'status' => 1,
            'status_tanggapan' => 1,
            'id_pelapor' => Request()->id_pelapor,
            'judul' => Request()->judul,
            'lokasi' => Request()->lokasi,
            'isi' => Request()->isi,
            'tgl_kejadian' => Request()->tgl_kejadian,
            'id_divisi' => Request()->unit,
            'tgl_laporan' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect()->route('home')->with('pesan', 'Laporan Berhasil Di Tambahkan !! ');
    }

    public function v_lap_total()
    {
        $data = [
            'laporan' => $this->AdministratorModel->v_lap_total(),
        ];
        return view('admin.v_laporan_total', $data);
    }

    public function v_tolak_laporan()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_laporan_ditolak(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('admin.v_laporan_ditolak', $data);
    }

    public function v_lap_tp()
    {
        $data = [
            'laporan' => $this->LaporanModel->v_lap_selesaiTp(),
            'unit' => $this->LaporanModel->v_unit(),
        ];
        return view('admin.v_laporan_selesai_tp', $data);
    }
}
