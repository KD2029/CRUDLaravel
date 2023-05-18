<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
        
    /**
     * handle
     *
     * @param  mixed $request
     * @param  mixed $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check())
        {
            if (auth()->user()->is_admin == 1){
                return $next($request);
            }
            else {
                return to_route('dashboard');
            }
        }
        
    }
}
