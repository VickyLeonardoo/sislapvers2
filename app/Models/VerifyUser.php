<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $fillable = [
        'token',
        'pelapor_id',
    ];

    public function pelapor(){
        return $this->belongsTo('App\Models\Pelapor');
    }
}
