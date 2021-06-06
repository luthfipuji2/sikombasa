<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model{
    use HasFactory;
    protected $table = 'seleksi';
    protected $primaryKey = 'id_seleksi';
    protected $fillable = ['penyeleksi', 
                           'id_translator', 
                           'nilai_berkas', 
                           'hasil',
                           'pewawancara', 
                           'catatan', 
                           'nilai_wawancara', 
                           'hasil_wawancara'
                            ];
}
?>