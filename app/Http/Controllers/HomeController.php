<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role=Auth::user()->role;
        if ($role=="admin"){
            return redirect('pages.admin.home')->to('admin');
        }elseif($role=="user"){
            return redirect('pages.admin.user')->to('user');
        }else{
            return redirect()->to('logout');
        }
    }
}
