<?php

namespace App\Http\Middleware;

use Closure;

class ClientAccessOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // will check is_super first then is_admin.
        abort_if(!auth()->user()->isClient, '400',  'Client zone only !!!');
        return $next($request);
    }
}
