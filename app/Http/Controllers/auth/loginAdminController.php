<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class loginAdminController extends Controller
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

        // $citizenInfo = Citizen::select()->where('identity_num',$request->identity_num)->first();

        // if($citizenInfo)
        // {
        //     if($citizenInfo->citizen_password == $request->citizen_password)
        //     {
        //        session()->put('idCitizen',$citizenInfo->id);
        //         return redirect()->route('Main.front');
        //     }
        //     else
        //     {
        //         redirect()->route('adminLogin')->with(['error' => "الرقم السري خاطى"]);
        //     }
        // }
        // else
        // {
        //     redirect()->route('adminLogin')->with(['error' => "الرقم الوطني خاطى"]);
             
        // }
    }

    

}
