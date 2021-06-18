<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterOrderDubbing extends Model
{
    use HasFactory;
    protected $table = 'parameter_order_dubbing';
    protected $primaryKey = 'id_parameter_order_dubbing';
    protected $fillable = [
        'durasi_video_min',
        'durasi_video_max',
        'harga'
    ];

    public function parameterorderharga(){
        return $this->hasOne('App\Models\Admin\ParameterOrderHarga', 'id_parameter_order_dubbing', 'id_parameter_order_dubbing');
    }
}
