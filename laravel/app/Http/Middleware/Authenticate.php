<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class Authenticate
{
    public function handle($request, Closure $next, $guard)
    {
        if(!Auth::guard($guard)->check())
        {
            $route = '/';
            
            switch ($guard) {
                case 'admin':
                    $route = 'admin.login';
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
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            route('/');
        }
    }
}
