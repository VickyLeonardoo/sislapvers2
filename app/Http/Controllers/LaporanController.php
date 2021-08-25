<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\LaporanModel;
use Carbon\Carbon;
use Auth;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->LaporanModel = new LaporanModel;
    }

    public function simpan_laporan()
    {
        Request()->validate([
            'nama' => 'required',
            'judul' => 'required',
            'lokasi' => 'required',
            'isi' => 'required',
            'tgl_kejadian' => 'required',
            'unit' => 'required',
            'foto' => 'required|mimes:jpg,bmp,png,mkv,mp4|max:10000',
            'foto2' => 'mimes:jpg,bmp,png,mkv,mp4|max:10000',
            'foto3' => 'mimes:jpg,bmp,png,mkv,mp4|max:10000',
        ],[
            'judul.required' => 'Judul Wajib Diisi',
            'lokasi.required' => 'Lokasi Wajib Diisi',
            'isi.required' => 'Isi Wajib Diisi',
            'tgl_kejadian.required' => 'Tanggal Wajib Diisi',
            'unit.required' => 'Unit Wajib Diisi',
            'foto.required' => 'Foto Wajib Diisi',
            'foto.max' => 'Ukuran Max 10MB',
            'foto2.max' => 'Ukuran Max 10MB',
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
            'nama' => Request()->nama,
            'judul' => Request()->judul,
            'lokasi' => Request()->lokasi,
            'isi' => Request()->isi,
            'tgl_kejadian' => Request()->tgl_kejadian,
            'unit' => Request()->unit,
            'kd' => Request()->unit,
            'status' => 1,
            'tgl_laporan' => Carbon::now()->format('Y-m-d'),
            'foto' => $fileName,
            'foto2' => $fileNames,
            'foto3' => $fileNamed,
        ];
        $this->LaporanModel->tambahData($data);
        return redirect()->route('user')->with('pesan','Data Berhasil Di Tambahkan !!');
    
    }

    public function update_laporan($id)
    {
        if (Auth::guard('user')->user()->level == 2) {
            $data = [
                'unit' => Request()->unit,
                'kd' => Request()->unit,
                'status' => 2,
                'investigasi' => Request()->investigasi,
            ];
        $this->LaporanModel->ubahData($id,$data);
        return redirect()->route('masuk');
        }
    }
}
