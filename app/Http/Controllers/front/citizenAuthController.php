<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class citizenAuthController extends Controller
{
   
    public function loginPage(Request $request)
    {
        try
        {
      
           return view('front.loginCitizenPage.index');
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in index',
           ]);
       }
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function checkAutCitizen(Request $request){

      
        $citizenRecord = Citizen::where('identity_num',$request->identity_num)
        ->where('citizen_password',$request->citizen_password)->first();
        
         if($citizenRecord){

            $request->session()->put('citizenId',$citizenRecord->id);
            return redirect('site/home');
            
         }
        else           
            return array($request,['error']);
          
           
        
       
       
       
       

    }
 
}
