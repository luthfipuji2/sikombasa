<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Panggil SendMail yang telah dibuat
use App\Mail\SendMail;
// Panggil support email dari Laravel
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(){
        $name = "Luthfi Puji Ningtyas";
        $email = "luthfi_puji1@student.uns.ac.id";
        $kirim = Mail::to($email)->send(new SendMail($name));

        if ($kirim) {
            echo "Email telah dikirim";
        }
    }
}
