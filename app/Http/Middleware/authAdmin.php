<?php

namespace App\Http\Middleware;

use Closure;

class authAdmin
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
         if(session()->has('idAdmin'))
        {
            return $next($request);
        }
        else
        {
           return redirect()->route('adminLogin');
        }
    }
}
