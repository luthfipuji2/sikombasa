<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterOrderDurasi extends Model
{
    use HasFactory;
    protected $table = 'parameter_order_durasi';
    protected $primaryKey = 'id_parameter_order_durasi';
    protected $fillable = [
        'durasi',
        'harga'
    ];

    public function order(){
        return $this->hasOne('App\Models\Klien\Order', 'id_parameter_order_durasi', 'id_parameter_order_durasi');
    }
}
