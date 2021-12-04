<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Waiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        
        if(auth()->user() && auth()->user()['role'] == 'waiter')
        return $next($request); 

        return redirect('login');
    }
}
