<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, int $role)
    // {
    //     if ($request->user()->role_id === $role) {
    //         return $next($request);
    //     }
    //     auth()->logout();
    //     return redirect()->route('login');
    // }

    // create a multi role middleware
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->role_id, $roles)) {
            return $next($request);
        }
        auth()->logout();
        return redirect()->route('login');
    }
}
