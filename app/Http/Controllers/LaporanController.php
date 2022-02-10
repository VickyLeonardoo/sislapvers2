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



class LaporanController extends Controller
{

    public function __construct()
    {
        $this->LaporanModel = new LaporanModel;
        $this->TanggapanModel = new TanggapanModel;
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
        ],[
            'judul.required' => 'Judul Wajib Diisi',
            'lokasi.required' => 'Lokasi Wajib Diisi',
            'isi.required' => 'Isi Wajib Diisi',
            'tgl_kejadian.required' => 'Tanggal Wajib Diisi',
            'unit.required' => 'Unit Wajib Diisi',
        ]);
        
        
        if($files = $request->file('image')){
            foreach ($files as $file) {
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->GetClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'file_laporan/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        Pengaduan::insert([
            'foto' => implode('|',$image),
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

        {
            $isi_email = [
                'title' => Request()->judul,
                'body' => Request()->isi,
            ];

            $tujuan = DB::table('users')->where('level', '2')->pluck('email');
            // $tujuan = 'vickyleonardo23@gmail.com';
            Mail::to($tujuan)->send(new SendEmail($isi_email));
            return redirect()->route('user')->with('pesan','Data Berhasil Di Tambahkan !! ');
        }

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

        $isi_email = [
            'title' => Request()->judul,
            'body' => Request()->isi,
        ];

        if (Request()->investigasi == 2) {
            $tujuan = DB::table('users')->where('id_divisi', Request()->unit)->pluck('email');
            // $tujuan = 'vickyleonardo23@gmail.com';
            Mail::to($tujuan)->send(new SendEmail($isi_email));
        }else {
            $tujuan = DB::table('users')->where('level', '3')->pluck('email');
            // $tujuan = 'vickyleonardo23@gmail.com';
            Mail::to($tujuan)->send(new SendEmail($isi_email));
        }
        
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
        $isi_email = [
            'title' => Request()->judul,
            'body' => Request()->isi,
        ];
        $tujuan = DB::table('users')->where('id_divisi', Request()->unit)->pluck('email');
            // $tujuan = 'vickyleonardo23@gmail.com';
            Mail::to($tujuan)->send(new SendEmail($isi_email));
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
                'tgl_ditanggapi' => Carbon::now()->format('Y-m-d'),
            ];

            $this->TanggapanModel->tanggapi($data);
            $this->TanggapanModel->update_status($id,$status);
            
            $tanggapan_email = [
                'title' => Request()->judul,
                'body' => Request()->isi,
            ];
            $tujuan = DB::table('users')->where('level', '3')->pluck('email');
            // $tujuan = 'vickyleonardo23@gmail.com';
            Mail::to($tujuan)->send(new TanggapanMail($tanggapan_email));

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
                'tgl_ditanggapi' => Carbon::now()->format('Y-m-d'),

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

        $tanggapan_email = [
            'title' => Request()->judul,
            'body' => Request()->isi,
        ];

        $tujuan = DB::table('users')->where('id_divisi', Request()->id_divisi)->pluck('email');
        // $tujuan = 'vickyleonardo23@gmail.com';
        Mail::to($tujuan)->send(new TanggapanMail($tanggapan_email));  
        
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

    public function perbaiki_tanggapan_pelapor($id)
    {
        $data = [
            'tanggapan' => Request()->tanggapan,
            'id_pengaduan' => Request()->id_pengaduan,
            'tgl_tanggapan'=> Carbon::now()->format('Y-m-d'),
            'status_tanggapan' => 4,
        ];
        
        $this->TanggapanModel->tanggapi($data);
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
