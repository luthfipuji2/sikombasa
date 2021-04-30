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
}