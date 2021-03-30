<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //protected $redirectTo='/klien';
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->type != "admin" && Auth::user()->type != 'translator'){
            return redirect()->to('/klien');
        }elseif(Auth::user()->type != "admin" && Auth::user()->type != 'klien'){
            return redirect()->to('/translator');
        }
        return $next($request);
    }
}
