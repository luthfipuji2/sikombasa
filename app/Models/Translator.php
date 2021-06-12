<?php

namespace App\Models;

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Order as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Translator extends Model
{
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
        return $this->hasMany('App\Order');
    }
}
