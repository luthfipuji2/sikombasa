<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterOrderAudio extends Model
{
    use HasFactory;
    protected $table = 'parameter_order_audio';
    protected $primaryKey = 'id_parameter_order_audio';
    protected $fillable = [
        'min_durasi_audio',
        'max_durasi_audio',
        'harga'
    ];

    public function parameterorderharga(){
        return $this->hasOne('App\Models\Admin\ParameterOrderHarga', 'id_parameter_order_audio', 'id_parameter_order_audio');
    }
}