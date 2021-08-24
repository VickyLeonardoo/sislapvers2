<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class TanggapanModel extends Model
{
    
    public function v_tanggapan($id)
    {
        return DB::table('tanggapan')
        ->where('id_pengaduan', $id)
        ->where('status_tanggapan','2')
        ->get();
    } 


}
