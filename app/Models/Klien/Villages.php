<?php

namespace App\Models\Klien;

use App\Models\KlienUser;
use App\Models\KlienOrder;
use App\Model\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villages extends Model
{

    use HasFactory;
    protected $table = 'indonesia_villages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'district_id',
        'name',
        'meta'
    ];

    public function klien(){
        return $this->hasMany('App\Models\Klien\Klien');
    }
}
