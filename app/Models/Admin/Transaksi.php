<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_order',
        'id_bank',
        'tgl_transaksi',
        'nominal_transaksi',
        'bukti_transaksi',
        'status_transaksi',
    ];

    public function order(){
        return $this->belongsTo('App\Models\Klien\Order','id_order','id_order');
    }

    public function parameter_order(){
        return $this->belongsTo('App\Models\Klien\ParameterOrder','id_parameter_order','id_parameter_order');
    }

    public function dist_fee(){
        return $this->belongsTo('App\Models\Admin\DistribusiFee','id__transaksi','id__transaksi');
    }


}
