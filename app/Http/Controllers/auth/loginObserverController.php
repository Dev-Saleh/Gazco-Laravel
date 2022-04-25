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
        //return view('auth.loginAdminPage.index');
    }


   public function logout()
    {
        // if(session()->has('idAdmin'))
        // {
        //     session()->forget("idAdmin");
        //     return view('auth.loginAdminPage.index');
        
        // }
    }

    public function checkadmin(Request $request)
    {

        //  $observerInfo = Observer::select()->where('observer_name',$request->observer_name)->first();

        // if($observerInfo)
        // {
        //     if($observerInfo->observer_password == $request->observer_password)
        //     {
        //        session()->put('idObserver',$observerInfo->id);
        //        // return redirect()->route('Main.front');
        //     }
        //     else
        //     {
        //        // redirect()->route('adminLogin')->with(['error' => "الرقم السري خاطى"]);
        //     }
        // }
        // else
        // {
        //     //redirect()->route('adminLogin')->with(['error' => "الرقم الوطني خاطى"]);
             
        // }
    }

    

}
