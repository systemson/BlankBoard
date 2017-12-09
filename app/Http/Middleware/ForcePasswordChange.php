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

        if(!routeNameIs(['users.edit', 'users.update'])) {

            if ($user->isNew()) {

                return redirect()->route('users.edit', $user->id)
                ->with('info', 'users.new-user');

            } elseif($user->passwordExpired()) {

                return redirect()->route('users.edit', $user->id)
                ->with('danger', 'users.password-expired');
            }
        }

        return $next($request);
    }
}
