<?php

namespace App\Models\Klien;

use App\Models\KlienUser;
use App\Models\KlienOrder;
use App\Model\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{

    use HasFactory;
    protected $table = 'indonesia_provinces';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'meta'
    ];

    public function klien(){
        return $this->hasMany('App\Models\Klien\Klien');
    }
}
