<?php

namespace App\Models\Klien;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Order as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'order';
    protected $primaryKey = 'id_order';

    protected $fillable = [
        'id_klien',
        'id_translator',
        'id_parameter_order',
        'id_parameter_order_audio',
        'id_parameter_dubber',
        'id_parameter_jenis_layanan',
        'id_parameter_jenis_teks',
        'id_parameter_order_dokumen',
        'id_parameter_order_dubbing',
        'id_parameter_order_subtitle',
        'id_parameter_order_teks', //buat hitung kata
        'jenis_layanan',
        'jenis_teks',
        'jumlah_halaman',
        'text',
        'nama_file',
        'nama_dokumen',
        'path_file',
        'size',
        'ekstensi',
        'pages',
        'jumlah_karakter',
        'durasi_video',
        'jumlah_dubber',
        'durasi_pertemuan',
        'latitude',
        'longitude',
        'lokasi',
        'durasi_pengerjaan',
        'durasi_audio',
        'tanggal_pertemuan',
        'waktu_pertemuan',
        'tipe_transkrip',
        'is_status',
        'status_at',
        'status_by',
        'tipe_offline',
        'harga',
        'jarak',
    ];

    protected $dates = [
        'tgl_order'
    ];

    public function klien(){
        return $this->hasMany('App\Models\Klien\Klien', 'id_klien', 'id_klien');
    }

    public function translator(){
        return $this->belongsTo('App\Models\Traslator\Translator','id_translator','id_translator');
    }

    public function parameter_order(){
        return $this->belongsTo('App\Models\Klien\ParameterOrder','id_parameter_order','id_parameter_order');
    }

    public function parameterjenislayanan(){
        return $this->belongsTo('App\Models\Admin\ParameterJenisLayanan', 'id_parameter_jenis_layanan', 'id_parameter_jenis_layanan');
    }

    public function parameterjenisteks(){
        return $this->belongsTo('App\Models\Admin\ParameterJenisTeks', 'id_parameter_jenis_teks', 'id_parameter_jenis_teks');
    }
}