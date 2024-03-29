<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array(auth()->user()->role->name, $roles)) {
            // is Super admin 
            // or admin
            return $next($request);
        };
        return abort(404);
    }
}
