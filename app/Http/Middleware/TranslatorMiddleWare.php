<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

class TranslatorMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(Auth::user()->type != "klien" && Auth::user()->type != 'translator'){
            return redirect()->to('/admin');
        }elseif(Auth::user()->type != 'translator' && Auth::user()->type != 'admin'){
            return redirect()->to('/klien');
        }
        return $next($request);
    }
}
