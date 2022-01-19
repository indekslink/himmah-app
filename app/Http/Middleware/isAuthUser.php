<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAuthUser
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
        $emailOnUrl = $request->route()->parameter('email');
        $emailIsLoggedIn = $request->user()->email;
        if ($emailOnUrl == $emailIsLoggedIn) {
            return $next($request);
        }
        return abort(404);
    }
}
