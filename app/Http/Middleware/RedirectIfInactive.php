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

        if ($user->isActive() || routeNameIs(['users.show', 'users.edit', 'users.update'])) {
            return $next($request);
        }

        return redirect()->route('users.show', $user->id)
        ->with('warning', 'messages.alert.inactive');
    }
}
