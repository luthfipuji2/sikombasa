<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterOrderHarga extends Model
{
    use HasFactory;
    protected $table = 'parameter_order_harga';
    protected $primaryKey = 'id_parameter_order_harga';
    protected $fillable = [
        'id_order',
        'id_parameter_order_teks',
        'id_parameter_order_dokumen',
        'id_parameter_order_subtitle',
        'id_parameter_order_dubbing',
        'id_parameter_jenis_layanan',
        'id_parameter_jenis_teks',
        'id_parameter_dubber',
        'id_parameter_order_audio'
    ];

    public function parameterordersubtitle(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderSubtitle', 'id_parameter_order_subtitle', 'id_parameter_order_subtitle');
    }
    public function parameterdubber(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderSubtitle', 'id_parameter_dubber', 'id_parameter_dubber');
    }
    public function parameterjenislayanan(){
        return $this->belongsTo('App\Models\Admin\ParameterJenisLayanan', 'id_parameter_dubber', 'id_parameter_dubber');
    }
    public function parameterjenisteks(){
        return $this->belongsTo('App\Models\Admin\ParameterJenisTeks', 'id_parameter_jenis_teks', 'id_parameter_jenis_teks');
    }
    public function parameterorderdokumen(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderDokumen', 'id_parameter_order_dokumen', 'id_parameter_order_dokumen');
    }
    public function parameterorderdubbing(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderDubbing', 'id_parameter_order_dubbing', 'id_parameter_order_dubbing');
    }
    public function parameterorderteks(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderTeks', 'id_parameter_order_teks', 'id_parameter_order_teks');
    }
    public function parameterorderaudio(){
        return $this->belongsTo('App\Models\Admin\ParameterOrderAudio', 'id_parameter_order_audio', 'id_parameter_order_audio');
    }
}
