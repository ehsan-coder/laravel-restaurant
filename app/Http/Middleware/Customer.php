<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next )
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return $next($request);
                
        //     }
        // }
        if(auth()->user() && auth()->user()['role'] == 'customer')
            return $next($request);
       
        return redirect('login');
    }
}
