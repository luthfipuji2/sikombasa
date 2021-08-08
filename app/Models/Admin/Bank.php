<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'bank';
    protected $primaryKey = 'id_bank';
    protected $fillable = [
        'nama_bank',
        'nama_rekening',
        'no_rekening',
        'kode_bank',
        'kode_bank_int',
        'lokasi_cabang'
    ];
}

