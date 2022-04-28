<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\Observer;
use Illuminate\Http\Request;

class loginObserverController extends Controller
{

   public  function login()
    {
        return view('auth.loginObserverPage.index');
    }


   public function logout()
    {
        if(session()->has('obsId'))
        {
            session()->forget("obsId");
            return view('auth.loginObserverPage.index');
        
        }
    }

    public function checkObserver(Request $request)
    {

          $obsInfo = Observer::where('observer_username',$request->observer_username)->first();

        if($obsInfo)
        {
             if($obsInfo->observer_password == $request->observer_password)
             {
               session()->put('obsId',$obsInfo->id);
               session()->put('obsUserName',$obsInfo->observer_username);
           
               return redirect()->route('observer.dashboard');
             }
        
            else
            {
               return  redirect()->route('observerLogin')->with(['error' => "الرقم السري خاطى"]);
            }
        }
        else return redirect()->route('observerLogin')->with(['error' => "أسم المستخدم خاطى"]);
             
        
    
    }
}