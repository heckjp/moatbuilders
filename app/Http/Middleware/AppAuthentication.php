<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppAuthentication
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
        if ($request->header('Authorization') !== env('MIX_API_KEY')) {
            return response()->json(['You shall not pass',403]);
        }
        return $next($request);
    }
}
