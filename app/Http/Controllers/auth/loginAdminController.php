<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\employee;
use Illuminate\Http\Request;

class loginAdminController extends Controller
{

   public  function login()
    {
        return view('auth.loginAdminPage.index');
    }


   public function logout()
    {
        if(session()->has('empId'))
        {
            session()->forget("empId");
            return view('auth.loginAdminPage.index');
        
        }
       
    }

    public function checkadmin(Request $request)
    {

        $empIfo = employee::select()->where('empUserName',$request->empUserName)->first();

        if($empIfo)
        {
            if($empIfo->empPassword == $request->empPassword)
            {
               session()->put('empId',$empIfo->id);
               session()->put('empUserName',$empIfo->empUserName);
               session()->put('empPhoto',$empIfo->empPhoto['valsrc']);
               
                return redirect()->route('admin.dashboard');
            }
            else
            {
               return redirect()->route('adminLogin')->with(['error' => "الرقم السري خاطى"]);
            }
        }
        else
        {
           return  redirect()->route('adminLogin')->with(['error' => "الرقم الوطني خاطى"]);
             
        }
    }

    

}
