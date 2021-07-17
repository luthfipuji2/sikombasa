<?php

namespace App\Models\Klien;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Order as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    protected $table = 'review';
    protected $primaryKey = 'id_review';

    protected $fillable = [
        'id_order',
        'review_text',
        'rating'
    ];
}
