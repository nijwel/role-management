<?php

namespace Nijwel\UserRole\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if (!Auth::check() || !Auth::user()->hasPermission($permission)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
