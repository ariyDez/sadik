<?php

namespace App\Http\Middleware;

use Closure;
//use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class SentinelAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(!Sentinel::check())
            if($request->ajax())
                return response('Unauthorized.', 401);
            else
                return redirect()->guest('login');
        return $next($request);
    }
}
