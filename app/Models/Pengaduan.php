<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengaduan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "pengaduan";
    protected $primaryKey = "id_pengaduan";
    protected $fillable = [
        'judul',
        'lokasi',
        'isi',
        'foto',
        'status',
        'tgl_kejadian',
        'tgl_laporan',
        'investigasi',
        'id_pelapor',
        'alasan',
        'id_divisi',
        'respon',
        'status_tanggapan',
        'tgl_ditanggapi',

    ];

}
