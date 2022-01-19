<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyHaventStore
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
        if (!auth()->user()->store) {

            return $next($request);
        }
        return abort(404);
    }
}
