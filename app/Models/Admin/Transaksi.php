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
        'harga_layanan',
        'harga_jenis_teks',
        'harga_teks',
        'harga_dokumen',
        'harga_subtitle',
        'harga_dubbing',
        'harga_dubber',
        'harga_menu_lisan',
        'no_rek_return',
        'nominal_return',
        'bukti_return',
    ];

    public function order(){
        return $this->belongsTo('App\Models\Klien\Order','id_order','id_order');
    }

    public function parameter_order(){
        return $this->belongsTo('App\Models\Klien\ParameterOrder','id_parameter_order','id_parameter_order');
    }

    public function parameter_layanan(){
        return $this->belongsTo('App\Models\Admin\ParameterJenisLayanan','id_parameter_jenis_layanan','id_parameter_jenis_layanan');
    }

    public function parameter_jenis_teks(){
        return $this->belongsTo('App\Models\Admin\ParameterJenisTeks','id_parameter_jenis_teks','id_parameter_jenis_teks');
    }
    
    public function parameter_teks(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderTeks','id_parameter_order_teks','id_parameter_order_teks');
    }

    public function parameter_dokumen(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderDokumen','id_parameter_order_dokumen','id_parameter_order_dokumen');
    }

    public function parameter_subtitle(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderSubtitle','id_parameter_order_subtitle','id_parameter_order_subtitle');
    }

    public function parameter_dubbing(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderDubbing','id_parameter_order_dubbing','id_parameter_order_dubbing');
    }

    public function parameter_dubber(){
        return $this->belongsTo('App\Models\Admin\ParameterDubber','id_parameter_dubber','id_parameter_dubber');
    }
    
    public function dist_fee(){
        return $this->belongsTo('App\Models\Admin\DistribusiFee','id__transaksi','id__transaksi');
    }


}
