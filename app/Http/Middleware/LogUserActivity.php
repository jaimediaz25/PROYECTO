<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogUserActivity
{
    public function handle($request, Closure $next)
    {
        if ($request->user()) { 
            Log::info('Usuario accedió a: ' . $request->path(), [
                'user_id' => $request->user()->id,
                'ip_address' => $request->ip(),
                'timestamp' => now(),
            ]);
        }
        return $next($request); 
    }
}
