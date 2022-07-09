<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\RoleUserPivot;
use App\Role;

class RoleBasedAuthorization
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
        $user = Auth::user();
        $role_id = RoleUserPivot::getRoleIdBasedOnUserId($user->id);
        if ($role_id == Role::EMPLOYEE_ROLE) {
            abort(403);
        }
        return $next($request);
    }
}
