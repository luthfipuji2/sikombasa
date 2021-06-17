<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterOrderSubtitle extends Model
{
    use HasFactory;
    protected $table = 'parameter_order_subtitle';
    protected $primaryKey = 'id_parameter_order_subtitle';
    protected $fillable = [
        'durasi_video_min',
        'durasi_video_max',
        'harga'
    ];

    public function parameterorderharga(){
        return $this->hasOne('App\Models\Admin\ParameterOrderHarga', 'id_parameter_order_subtitle', 'id_parameter_order_subtitle');
    }
}
