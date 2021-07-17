<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Order as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Translator extends Model
{
    use HasFactory;
    protected $table = 'translator';
    protected $primaryKey = 'id_translator';

    protected $fillable = [
        'id',
        'nik',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kabupaten',
        'kode_pos',
        'nama_bank',
        'nama_rekening',
        'rekening_bank',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telp',
        'foto_ktp',
        'status'
    ];

    public function order(){
        return $this->hasMany('App\Models\Klien\Order', 'id_translator', 'id_translator');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
}
