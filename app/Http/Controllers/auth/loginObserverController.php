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

          $obsInfo = Observer::where('obsUserName',$request->obsUserName)->first();

        if($obsInfo)
        {
             if($obsInfo->obsPassword == $request->obsPassword)
             {
               session()->put('obsId',$obsInfo->id);
               session()->put('obsUserName',$obsInfo->obsUserName);
           
               
           
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