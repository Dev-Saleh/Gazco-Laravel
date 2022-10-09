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

        $citizenInfo = Citizen::select()->where('identityNum',$request->identityNum)->first();

        if($citizenInfo)
        {
            if($citizenInfo->citPassword == $request->citPassword)
            {   
                if($citizenInfo->checked == 'نعم')
                {
                    session()->put('idCitizen',$citizenInfo->id);
                    
                    return redirect()->route('Main.front');
                }
                else
                {
                    return redirect()->route('login')->with(['error'=>"المعذره لم يتم التحقق من بياناتك"]);
                }
            }
            else
             {
                 return redirect()->route('login')->with(['error'=>"الرقم السري خاطى"]);
             }
                
        }
        else
        {
            return redirect()->route('login')->with(['error'=>"الرقم الوطني خاطى"]);
         
        }
    }

    

}
