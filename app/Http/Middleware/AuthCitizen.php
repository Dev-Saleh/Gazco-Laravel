<?php

namespace App\Http\Middleware;

use App\Models\Citizen;
use Closure;

class AuthCitizen
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
        if(session()->has('idCitizen'))
        {
            $idCitizen=Citizen::find(session()->get('idCitizen'));
            if($idCitizen)
            return $next($request);
            else return redirect()->route('login');
        }
        else
        {
           return redirect()->route('login');
        }
       
    }
}
