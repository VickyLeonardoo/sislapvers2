<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\LaporanModel;
use App\Models\TanggapanModel;
use Carbon\Carbon;
use Auth;


class LaporanController extends Controller
{

    public function __construct()
    {
        $this->LaporanModel = new LaporanModel;
        $this->TanggapanModel = new TanggapanModel;
    }

    public function simpan_laporan()
    {
        
        Request()->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'isi' => 'required',
            'tgl_kejadian' => 'required',
            'unit' => 'required',
            'foto' => 'required|mimes:jpg,bmp,png,mkv,mp4|max:10000',
            'foto2' => 'required|mimes:jpg,bmp,png,mkv,mp4|max:10000',
            'foto3' => 'required|mimes:jpg,bmp,png,mkv,mp4|max:10000',
            'tgl_kejadian' => 'required',
        ],[
            'judul.required' => 'Judul Wajib Diisi',
            'lokasi.required' => 'Lokasi Wajib Diisi',
            'isi.required' => 'Isi Wajib Diisi',
            'tgl_kejadian.required' => 'Tanggal Wajib Diisi',
            'unit.required' => 'Unit Wajib Diisi',
            'foto.required' => 'Foto Wajib Diisi',
            'foto.max' => 'Ukuran Max 10MB',
            'foto2.max' => 'Ukuran Max 10MB',
            'foto2.required' => 'Foto Wajib Diisi',
            'foto3.required' => 'Foto Wajib Diisi',
            'foto3.max' => 'Ukuran Max 10MB',
        ]);
        
        $file = Request()->foto;
        $randomno=rand(0,10000000);
        $time = time();
        $exte = $file->GetClientOriginalExtension();
        $fileName = $time. $randomno. '.' .$exte;
        $fileNames = $time. $randomno. '.' .$exte;
        $file->move(public_path('file_laporan'),$fileName);

        $file2 = Request()->foto2;
        $randomno2=rand(0,10000000);
        $time2 = time();
        $exte2 = $file2->GetClientOriginalExtension();
        $fileNames = $time2. $randomno2. '.' .$exte2;
        $file2->move(public_path('file_laporan'),$fileNames);

        $file3 = Request()->foto3;
        $randomno3=rand(0,10000000);
        $time3 = time();
        $exte3 = $file3->GetClientOriginalExtension();
        $fileNamed = $time3. $randomno3. '.' .$exte3;
        $file3->move(public_path('file_laporan'),$fileNamed);



        $data = [
            'id_pelapor' => Request()->id_pelapor,
            // 'nama' => Request()->nama,
            'judul' => Request()->judul,
            'lokasi' => Request()->lokasi,
            'isi' => Request()->isi,
            'tgl_kejadian' => Request()->tgl_kejadian,
            // 'unit' => Request()->unit,
            // 'kd' => Request()->unit,
            'id_divisi' => Request()->unit,
            'status' => 1,
            'status_tanggapan' => 1,
            'tgl_laporan' => Carbon::now()->format('Y-m-d'),
            'foto' => $fileName,
            'foto2' => $fileNames,
            'foto3' => $fileNamed,
        ];
        $this->LaporanModel->tambahData($data);
        return redirect()->route('user')->with('pesan','Data Berhasil Di Tambahkan !! ');
        
    
    }

    public function update_laporan($id)
    {
        if (Auth::guard('user')->user()->level == 2) {
            $data = [
                // 'unit' => Request()->unit,
                // 'kd' => Request()->unit,
                'id_divisi' => Request()->unit,
                'status' => 2,
                'investigasi' => Request()->investigasi,
            ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('masuk');
        }
        elseif (Auth::guard('user')->user()->level == 4) {
            $data = [
                'status' => 3,
                'investigasi' => 2,
            ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('u_masuk');
        }
        elseif (Auth::guard('user')->user()->level == 3) {
            $data = [
                'status' => 2,
                'investigasi' => 2,
                'id_divisi' => Request()->unit,
            ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('m_masuk')->with('pesan','Laporan Berhasil Diteruskan');
        }
    }

    public function ubah_laporan_inv($id)
    {
        $data = [
            'status' => 2,
            'investigasi' => 1,
        ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('m_masuk');
    }

    public function v_lap_masuk()
    {
        if (Auth::guard('user')->user()->level == 4) {
            $data = [
                'laporan' => $this->LaporanModel->v_lap_masuk(),
                'unit' => $this->LaporanModel->v_unit(),
            ];
            return view('unit.v_lap_masuk',$data);
        }
        elseif (Auth::guard('user')->user()->level == 3) {
            $data = [
                'laporan' => $this->LaporanModel->v_lap_masuk(),
                'unit' => $this->LaporanModel->v_unit(),
            ];
            return view('manajemen.v_lap_masuk',$data);
        }
        elseif(Auth::guard('user')->user()->level == 2)
        {
            $data = [
                'laporan' => $this->LaporanModel->v_lap_masuk(),
                'unit' => $this->LaporanModel->v_unit(),
            ];
            return view('admin.v_lap_masuk',$data);
        }
        
    }

    public function v_lap_proses()
    {
        if (Auth::guard('user')->user()->level == 2) {
            $data = [
                'laporan' => $this->LaporanModel->v_lap_proses()
            ];
            return view('admin.v_lap_proses',$data);
        }
        elseif (Auth::guard('user')->user()->level == 3) {
            $data = [
                'laporan' => $this->LaporanModel->v_lap_proses(),
                'unit' => $this->LaporanModel->v_unit(),
            ];
            return view('manajemen.v_lap_investigasi',$data);
        }
        
    }

    public function v_lap_selesai()
    {
        if (Auth::guard('user')->user()->level == 2) {
            $data = [
                'laporan' => $this->LaporanModel->v_lap_selesai()
           ];
           return view('admin.v_lap_selesai',$data);
        }
        elseif(Auth::guard('user')->user()->level == 3){
            $data = [
                'laporan' => $this->LaporanModel->v_lap_selesai()
            ];
            return view('manajemen.v_lap_selesai',$data);
        }
        elseif(Auth::guard('user')->user()->level == 4){
            $data = [
                'laporan' => $this->LaporanModel->v_lap_selesai()
            ];
            return view('unit.v_lap_selesai',$data);
        }
    }

    public function tanggapi($id)
    {
        if (Auth::guard('user')->user()->level == 4) {
            $data = [
                'tanggapan' => Request()->tanggapan,
                'id_pengaduan' => Request()->id,
                'tgl_tanggapan'=> Carbon::now()->format('Y-m-d'),
                'status_tanggapan' => 1,
            ];
            $status = [
                'status_tanggapan' => 4,
            ];
            $this->TanggapanModel->tanggapi($data);
            $this->TanggapanModel->update_status($id,$status);
            return redirect()->route('u_masuk');
        }
        elseif (Auth::guard('user')->user()->level == 3) {
            $data = [
                'tanggapan' => Request()->tanggapan,
                'id_pengaduan' => Request()->id,
                'tgl_tanggapan'=> Carbon::now()->format('Y-m-d'),
                'status_tanggapan' => 4,
            ];

            $status = [
                'status_tanggapan' => 2,
            ];
            $this->TanggapanModel->tanggapi($data);
            $this->TanggapanModel->update_status($id,$status);
            return redirect()->route('m_investigasi')->with('pesan','Tanggapan Berhasil Dikirim!');
        }
       
    }

    public function kirim_tanggapan($id,$idp)
    {
        $data = [
            'status_tanggapan' => 4,
        ];
        $status = [ 
            'status_tanggapan' => 2,
        ];
        $this->TanggapanModel->kirim_tanggapan($id,$data);
        $this->TanggapanModel->update_status($idp,$status);
        return redirect()->route('m_tanggapan');
    }

    public function kembalikan_tanggapan($id)
    {
        $data = [
            'id_pengaduan' => Request()->id_pengaduan,
            'id_tanggapan' => Request()->id_tanggapan,
            'alasan_tolak' => Request()->komentar,
        ];

        $update = [
            'status_tanggapan' => 2,
        ];

        $this->TanggapanModel->kembalikanTanggapan($data);  
        $this->TanggapanModel->kirim_tanggapan($id,$update);     
        return redirect()->route('m_tanggapan');
    }

    public function perbaiki_tanggapan($id)
    {
        $data = [
            'tanggapan' => Request()->tanggapan,
            'id_pengaduan' => Request()->id_pengaduan,
            'tgl_tanggapan'=> Carbon::now()->format('Y-m-d'),
            'status_tanggapan' => 1,
        ];

        $update = [
            'status_tanggapan' => 3,
        ];

        $this->TanggapanModel->tanggapi($data);
        $this->TanggapanModel->updateTanggapan($id,$update);
        return redirect()->route('u_tanggapan');
    }

    public function suksesTanggapan($id)
    {
        $data = [
            'laporan' => $this->TanggapanModel->tanggapanSukses($id),
        ];
        return view('unit.v_tanggapan_s',$data);
    }

    public function v_tanggapan_tolak($id)
    {
        $data = [
            'laporan' => $this->TanggapanModel->tanggapan_u_tolak($id),
        ];
        return view('unit.v_tanggapan_t',$data);
    }

}
