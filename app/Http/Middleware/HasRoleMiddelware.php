<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasRoleMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,string $role)
    {
        if (auth()->user() || !auth()->user()->hasrole($role) ){
            return redirect(route('404'));
        }
        return $next($request);
    }
}
