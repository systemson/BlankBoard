<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfInactive
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
        $user = $request->user();

        if ($user->isActive() || $request->route()->getName() == 'users.show' ) {

            return $next($request);
        }

        return redirect()->route('users.show', $user->id);
    }
}
