<?php

namespace App\Http\Middleware;

use App\Models\employee;
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
         if(session()->has('empId'))
        {
            $empId=employee::find(session()->get('empId'));
            if($empId)
            return $next($request);
            else return redirect()->route('adminLogin');
        }
        else
        {
           return redirect()->route('adminLogin');
        }
    }
}
