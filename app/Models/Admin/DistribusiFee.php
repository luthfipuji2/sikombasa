<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistribusiFee extends Model
{
    use HasFactory;
    protected $table = 'distribusi_fee';
    protected $primaryKey = 'id_fee';
    protected $fillable = [
        'id__transaksi',
        'fee_translator',
        'fee_sistem',
        'bukti_fee_trans'
    ];
}
