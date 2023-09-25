<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizationCheck
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
        if(!Session()->has('loginId')){
            return redirect('login')->with('fail','please,login first!');
        }
        return $next($request);
    }
}
