<?php

namespace App\Http\Middleware;

use App\Models\Observer;
use Closure;

class authObserver
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


        if(session()->has('obsId'))
        {
            $obsId=Observer::find(session()->get('obsId'));
            if($obsId)
            return $next($request);
            else return redirect()->route('observerLogin');
        }
         else
         {
             return redirect()->route('observerLogin');
         }
        
    }
}
