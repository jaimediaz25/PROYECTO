<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RequestLog;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    public function handle(Request $request, Closure $next)
    {
        RequestLog::create([
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'parameters' => json_encode($request->all()),
            'ip_address' => $request->ip(),
        ]);
        return $next($request);
    }
}

