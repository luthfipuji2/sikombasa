<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Panggil UpdateBiodataMail yang telah dibuat
use App\Mail\UpdateBiodataMail;
// Panggil support email dari Laravel
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UpdateBiodataEmailController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $kirim = Mail::to($email)->send(new UpdateBiodataMail($name));
    
        if($kirim){
            echo "Email telah dikirim";
            
        }
        return redirect('/profile-klien')->with('success', 'Profile anda berhasil diubah');
        
     
    }
}
