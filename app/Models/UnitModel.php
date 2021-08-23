<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class UnitModel extends Model
{
    public function v_unit()
    {
        return DB::table('unit')->get();
    }
}
