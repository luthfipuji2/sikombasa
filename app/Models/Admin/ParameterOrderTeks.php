<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterOrderTeks extends Model
{
    use HasFactory;
    protected $table = 'parameter_order_teks';
    protected $primaryKey = 'id_parameter_order_teks';
    protected $fillable = [
        'jumlah_karakter_min',
        'jumlah_karakter_max',
        'harga'
    ];

    public function parameterorderharga(){
        return $this->hasOne('App\Models\Admin\ParameterOrderHarga', 'id_parameter_order_teks', 'id_parameter_order_teks');
    }
}
