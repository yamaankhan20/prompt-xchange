<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
     
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return $next($request);
        }else if (Auth::check() && Auth::user()->hasRole('general_user')){

            return $next($request);

        }else if (Auth::check() && Auth::user()->hasRole('content_creator')){
                return $next($request);
        }
        return redirect('/');
    }
    
   
}
