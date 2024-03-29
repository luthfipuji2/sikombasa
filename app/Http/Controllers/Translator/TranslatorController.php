<?php

namespace App\Http\Controllers\Translator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TranslatorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.translator.home', compact('user'));
    }
}
