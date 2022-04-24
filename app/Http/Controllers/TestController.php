<?php

namespace App\Http\Controllers;

use App\logs_Table;
use App\Models\Agent;
use App\Models\Citizen;
use App\Models\Directorate;
use App\Models\gaz_Logs;
use App\Models\logs_Booking;
use App\Models\Observer;
use App\Models\Rigon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('front.checkBooking.index');
    }

   
    public function create(Request $request)
    {   
    //     $agentArray = array("كريم حسن القعر",
    //     "معاذ عبدالله يحيى",
    //     "عبدالناصر اسماعيل علي",
    //     "عبدالرب احمد سالمين",
    //     "ياسر احمد محمود",
    // );

    // $aa = Directorate::all()->random()->id;

    // $ss = Rigon::all()->random()->id;
    // $zz = Rigon::select()->where('directorate_id',$aa)->get();
    // $qq=  $zz->random()->id;
    
    
    //  $mm = Agent::select()->where('directorate_id',$aa)->get();
    //  $mmm=  $mm->random()->id;
    

            // $aa = Directorate::all()->random()->id;
            // $aa = Rigon::select()->inRandomOrder()->get("id");
                // $aa = Directorate::all()->random()->id;
                // $bb = Rigon::select()->where('directorate_id', $aa)->get();
                // $cc = $bb->random()->id;
                // $mm = Agent::select()->where('directorate_id', $aa)->get();
                // $tt= $mm->random()->id;
            // $zz = Rigon::select()->where('directorate_id', $aa)->get();
            // $mm = Agent::select()->where('directorate_id', $aa)->get();
            // $qq =  $zz->random()->id;
            //  $tt= $mm->random()->id;
            // $aa = Directorate::all()->random()->id;
            // $zz = Rigon::select()->where('directorate_id', $aa)->get();
            // $mm = Agent::select()->where('directorate_id', $aa)->get();
            // $qq =  $zz->random()->id;
            // $tt = $mm->random()->id;
        // echo $mm;


        // $aa = Directorate::all()->random()->id;
        // $bb = Rigon::select()->where('directorate_id', $aa)->get();
        // $cc = $bb->random()->id;

        //  $mm = Agent::select()->where('directorate_id', $aa)->get();
        //  $ag = $mm->random()->id;

        //  $ob = Observer::select()->where('agent_id', $ag)->get();
        //  if($ob=[''])
        //  {
        //      return 'empty';
        //  }
        //  else
          $citizen = Citizen::find(1);
          $u = '7069293';
        // $lastGazLogs=gaz_Logs::where('allowBookig','1')->where('agent_id',$citizen->observer->agent_id)->latest('id')->first();
        // $lastGazLogs=gaz_Logs::where('allowBookig','1')->where('agent_id',$citizen->observer->agent_id)->latest('id')->first();
        // $lastRequest=logs_Booking::where('citizen_id',$citizen)->latest('id')->first();
        $citizenRecord = Citizen::where('identity_num',$request->identity_num)->first();
            return array($citizenRecord  );
        
        

       
        // return  $zz ;
    }
}
  