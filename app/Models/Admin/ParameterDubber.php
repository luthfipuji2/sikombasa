<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterDubber extends Model
{
    use HasFactory;
    protected $table = 'parameter_dubber';
    protected $primaryKey = 'id_parameter_dubber';
    protected $fillable = [
        'p_jumlah_dubber',
        'harga'
    ];

    public function parameterorderharga(){
        return $this->hasOne('App\Models\Admin\ParameterOrderHarga', 'id_parameter_dubber', 'id_parameter_dubber');
    }
}
