<?php

namespace App\Http\Controllers;


use NumberFormatter;

use Illuminate\Support\Facades\Mail;
use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;


use Nexmo\Laravel\Facade\Nexmo;


use App\logs_Table;
use App\Models\Agent;
use App\Models\Citizen;
use App\Models\Directorate;
use App\Models\gaz_Logs;
use App\Models\logs_Booking;
use App\Models\Observer;
use App\Models\Rigon;
use Directory;
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
        return view('dashboard.admin.reports.index');
    }

    public function sendSms(Request $request)
    {



        $basic  = new \Vonage\Client\Credentials\Basic("0b7f2938", "wz6ZpeHzTUApU3ON");
        $client = new \Vonage\Client($basic);


        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("967718360830", 'Gasco | Aden', 'تم صدور دفعه جديده لوكيلك وتم فتح الحجز')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
        echo "Message has been sent successfuly";
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
        //   $citizen = Citizen::find(1);
        //   $u = '7069293';
        // $lastGazLogs=gaz_Logs::where('allowBookig','1')->where('agent_id',$citizen->observer->agent_id)->latest('id')->first();
        // $lastGazLogs=gaz_Logs::where('allowBookig','1')->where('agent_id',$citizen->observer->agent_id)->latest('id')->first();
        // $lastRequest=logs_Booking::where('citizen_id',$citizen)->latest('id')->first();
        // $citizenRecord = Citizen::where('identity_num',$request->identity_num)->first();

        // $citizenInfo = Citizen::select()->where('identity_num','7069293')->get();
        // $lastGazLogs=gaz_Logs::where('allowBookig','1')->where('agent_id','8')->latest('id')-
        
        $lastAgent = Agent::get()->last();
            $dirLast = Directorate::select()->where('id',$lastAgent->directorate_id)->get();
        $agents =Agent::get()->last();
        
            return array($lastAgent, $dirLast);
        
        
     
        // return  $zz ;
    }
}
  