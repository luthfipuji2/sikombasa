<?php

namespace App\Models\Admin;

use App\Models\Klien\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterJenisLayanan extends Model
{
    use HasFactory;
    protected $table = 'parameter_jenis_layanan';
    protected $primaryKey = 'id_parameter_jenis_layanan';
    protected $fillable = [
        'p_jenis_layanan',
        'harga'
    ];

    public function parameterorderharga(){
        return $this->hasOne('App\Models\Admin\ParameterOrderHarga', 'id_parameter_jenis_layanan', 'id_parameter_jenis_layanan');
    }

    public function order(){
        return $this->hasOne('App\Models\Klien\Order', 'id_parameter_jenis_layanan', 'id_parameter_jenis_layanan');
    }
}