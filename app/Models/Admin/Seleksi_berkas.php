<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi_berkas extends Model{
    use HasFactory;
    protected $table = 'Seleksi_berkas';
    protected $primaryKey = 'id_seleksi_berkas';
    protected $fillable = ['id_admin', 
                           'id_translator', 
                           'nilai', 
                           'hasil'
                            ];
    public function translator(){
        return $this->belongsToMany(Translator::class, 'master_keahlian', 'id_keahlian', 'id_translator');
    }
}
?>