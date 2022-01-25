<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Store;

class Notification
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
        //cek apakah user yang login mempunyai toko
        // dan toko tersebut berstatus suspend atau tidak
        if ($request->user()->has('store') && $request->user()->store->has('suspend')) {
            $suspendStore = Store::with('suspend')->where('slug', $request->user()->store->slug)->firstOrFail();
        }
    }
}
