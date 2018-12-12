<?php

namespace App\Http\Middleware;

use Closure;

class DesignerAccessOnly
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
        abort_if(!auth()->user()->isDesigner || !auth()->user()->isAdmin, '400',  'Designer zone only !!!');
        return $next($request);
    }
}
