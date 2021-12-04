<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next , ...$guards)
    {
        // dd($guards[0]);

        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return $next($request);
                
        //     }
        // }
        if(auth()->user() && auth()->user()['role'] == 'admin'){
            return $next($request);
        }

        return redirect('login');
    }
}
