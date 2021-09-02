<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class MasyarakatModel extends Model
{
    public function tambah($data)
    {
        DB::table('pelapor')->insert($data);
    }
}
