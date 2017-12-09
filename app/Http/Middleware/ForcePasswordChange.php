<?php

namespace App\Http\Middleware;

use Closure;

class ForcePasswordChange
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

        if ($user->last_password_change != null || routeNameIs(['users.edit', 'users.update'])) {

            return $next($request);
        }

        return redirect()->route('users.edit', $user->id)
        ->with('info', 'users.new-user');
    }
}
