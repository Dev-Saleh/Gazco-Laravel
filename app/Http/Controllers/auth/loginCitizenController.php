<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class loginCitizenController extends Controller
{

   public  function login()
    {
        return view('auth.loginCitizenPage.index');
    }


   public function logout()
    {
        if(session()->has('idCitizen'))
        {
            session()->forget("idCitizen");
            return view('auth.loginCitizenPage.index');
        
        }
    }

    public function checkCitizen(Request $request)
    {

        $citizenInfo = Citizen::select()->where('identity_num',$request->identity_num)->where('checked','1')->first();

        if($citizenInfo)
        {
            if($citizenInfo->citizen_password == $request->citizen_password)
            {
               session()->put('idCitizen',$citizenInfo->id);
                return redirect()->route('Main.front');
            }
            else
            {
               return redirect()->route('login')->with(['error' => "الرقم السري خاطى"]);
            }
        }
        else
        {
           return redirect()->route('login')->with(['error' => "الرقم الوطني خاطى"]);
             
        }
    }

    

}
