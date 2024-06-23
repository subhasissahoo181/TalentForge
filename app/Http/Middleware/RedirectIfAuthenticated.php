<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
    public function handle(Request $request, Closure $next, string ...$guards):Response
    {
        $guards = empty($guards) ? [null]:$guards;
        foreach($guards as $guard){
            if(Auth::guard($guard)->check()){
                return redirect(route('account.profile'));
            }
        }
        
        return $next($request);
    }
}
