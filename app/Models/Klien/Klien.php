<?php

namespace App\Models\Klien;

use App\Models\KlienUser;
use App\Models\KlienOrder;
use App\Model\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;
    protected $table = 'klien';
    protected $primaryKey = 'id_klien';

    protected $fillable = [
        'id',
        'nik',
        'villages_id',
        'provinces_id',
        'cities_id',
        'districts_id',
        'kode_pos',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telp',
        'foto_ktp'
    ];

    public function order(){
        return $this->hasMany('App\Models\Klien\Order', 'id_klien', 'id_klien');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }

    public function provinsi(){
        return $this->belongsTo('App\Models\Klien\Provinsi', 'provinces_id', 'id');
    }
    public function kabupaten(){
        return $this->belongsTo('App\Models\Klien\Cities', 'cities_id', 'id');
    }
    public function kecamatan(){
        return $this->belongsTo('App\Models\Klien\Districts', 'districts_id', 'id');
    }
    public function desa(){
        return $this->belongsTo('App\Models\Klien\Villages', 'villages_id', 'id');
    }
}
