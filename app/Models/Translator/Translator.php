<?php
namespace App\Models\Translator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translator extends Model{
    protected $table = 'translator';
    protected $primaryKey = 'id_translator';
    protected $fillable = ['id',
                           'nama',
                           'nik', 
                           'keahlian', 
                           'alamat', 
                           'provinsi', 
                           'kabupaten', 
                           'kecamatan', 
                           'kode_pos', 
                           'nama_bank', 
                           'nama_rekening', 
                           'rekening_bank', 
                           'tgl_lahir', 
                           'jenis_kelamin', 
                           'no_telp', 
                           'foto_ktp'];

    public function keahlian(){
    return $this->belongsToMany(Certificate::class, 'master_keahlian', 'id_translator', 'id_keahlian');
    }
    public function order(){
        return $this->hasMany(Order::class,'id_order','id_translator');
    }
    
}
?>