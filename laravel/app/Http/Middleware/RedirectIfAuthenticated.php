<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $route = '/';

            switch ($guard) {
                case 'admin':
                    $route = 'admin';
                    break;

                case 'wali':
                    $route = 'wali';
                    break;

                case 'tu':
                    $route = 'tu';
                    break;

                case 'kepsek':
                    $route = 'kepsek';
                    break;
            }


            return redirect()->route($route);
        }

        return $next($request);
    }
}
