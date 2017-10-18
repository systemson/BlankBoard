<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Access
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

        if(!Auth::user()->hasRole('superadmin') || !Auth::user()->hasPermission('users_module')) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
