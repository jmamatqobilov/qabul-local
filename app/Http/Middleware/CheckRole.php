<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() && !$request->user()->hasRole($role)) {
            if($request->user()->hasRole('admin'))
                return redirect('/admin');
            if($request->user()->hasRole('ukn'))
                return redirect('/ukn');
            if($request->user()->hasRole('hududiy'))
                return redirect('/hududiy');
            if($request->user()->roles->count() == 0)
                $request->user()->assignRole(Role::where('name', 'Registered')->first());
            return redirect('/');
        }
        return $next($request);
    }
}
