<?php

namespace App\Http\Middleware;

use Closure;

class OnlyActiveUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(!auth()->user()->active, '400', 'Active Users zone only !!!');
        return $next($request);
    }
}
