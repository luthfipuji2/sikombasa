<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterJenisTeks extends Model
{
    use HasFactory;
    protected $table = 'parameter_jenis_teks';
    protected $primaryKey = 'id_parameter_jenis_teks';
    protected $fillable = [
        'p_jenis_teks',
        'harga'
    ];

    public function parameterorderharga(){
        return $this->hasOne('App\Models\Admin\ParameterOrderHarga', 'id_parameter_jenis_teks', 'id_parameter_jenis_teks');
    }

    public function order(){
        return $this->hasOne('App\Models\Klien\Order', 'id_parameter_jenis_teks', 'id_parameter_jenis_teks');
    }
}
