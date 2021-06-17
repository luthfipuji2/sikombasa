<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterOrderDokumen extends Model
{
    use HasFactory;
    protected $table = 'parameter_order_dokumen';
    protected $primaryKey = 'id_parameter_order_dokumen';
    protected $fillable = [
        'jumlah_halaman_min',
        'jumlah_halaman_max',
        'harga'
    ];

    public function parameterorderharga(){
        return $this->hasOne('App\Models\Admin\ParameterOrderHarga', 'id_parameter_order_dokumen', 'id_parameter_order_dokumen');
    }
}
