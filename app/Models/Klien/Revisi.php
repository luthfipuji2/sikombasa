<?php

namespace App\Models\Klien;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Order as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Klien\Order;


class Revisi extends Model
{
    protected $table = 'revisi';
    protected $primaryKey = 'id_revisi';

    protected $fillable = [
        'id_order',
        'text_revisi',
        'path_file_revisi',
        'pesan_revisi',
        'tgl_pengajuan_revisi',
        'durasi_pengerjaan_revisi'
    ];

    public function order(){
        return $this->belongsTo('App\Models\Klien\Order', 'id_order', 'id_order');
    }
}
