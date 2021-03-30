<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KlienMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //protected $redirectTo = '/admin';
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->type != "klien" && Auth::user()->type != 'translator'){
            return redirect()->to('/admin');
        }elseif(Auth::user()->type != 'klien' && Auth::user()->type != 'admin'){
            return redirect()->to('/translator');
        }
        return $next($request);
    }
}
