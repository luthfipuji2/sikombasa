<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Order as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'klien';
    protected $primaryKey = 'id_klien';

    protected $fillable = [
        'id',
        'nik',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kode_pos',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telp',
        'foto_ktp'
    ];

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function user(){
        return $this->hasMany('App\User');
    }
}