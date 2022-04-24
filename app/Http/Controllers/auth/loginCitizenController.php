<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class loginCitizenController extends Controller
{
    function login()
    {
        return view('auth.loginCitizenPage.index');
    }

    function logout()
    {
        if(session()->has('idCitizen'))
        {
            session()->forget("idCitizen");
            return view('auth.loginCitizenPage.index');
        
        }
    }

    public function checkCitizen(Request $request){
        $citizenInfo = Citizen::select()->where('identity_num',$request->identity_num)->first();

        if($citizenInfo)
        {
            if($citizenInfo->citizen_password == $request->citizen_password)
            {
               session()->put('idCitizen',$citizenInfo->id);
                return redirect()->route('Main.front');
            }
            else
            {
                echo "الرقم السري خاطى";
            }
        }
        else
        {
             echo "الرقم الوطني خاطى";
        }

              
    }

    


}
