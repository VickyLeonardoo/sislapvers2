<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelapor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "pelapor";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'level',
        'no_hp',
        'username',
        'email',
        'password',

    ];

    public function verifyUser(){
        return $this->hasOne('App\Models\VerifyUser');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
