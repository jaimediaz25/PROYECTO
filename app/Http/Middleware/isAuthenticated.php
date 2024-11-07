<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAuthenticated
{
    
    public function handle(Request $request, Closure $next): Response
    {
        //dd(vars: 'estas entrando al middleware');
        //$auth = Auth::check();
        if(!Auth::check()){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
