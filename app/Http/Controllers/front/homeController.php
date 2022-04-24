<?php

namespace App\Http\Controllers\front;

use App\Events\newBooking;
use App\Http\Controllers\Controller;

use App\Models\Agent;
use App\Models\Citizen;
use App\Models\Directorate;
use App\Models\gaz_Logs;
use App\Models\logs_Booking;
use App\Models\Rigon;
use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try
        {
      
           return view('front.home.index');
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in indexxxxxxx',
           ]);
       }
    }
 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try { 
              
                $logbookings =logs_Booking::create([
                    'booking_date' =>now(),
                    'status_booking'=>'0',
                    'citizen_id'=>$request->citizen_id,
                    'NumBatch'=>$request->NumBatch,
                    'created_at'=>now() // ???????????????????/
                ]);
               $logbookings->save();
               $citizen = Citizen::find($request -> citizen_id); //??????????
               $lastGazLogs=gaz_Logs::where('allowBookig','1')->where('agent_id',$citizen->observer->agent_id)->latest('id')->first();   
               event(new newBooking( $lastGazLogs));
               if ($logbookings)
                    return response()->json([
                        'status' => true,
                        'msg' => 'تم الحفظ بنجاح',
                        'lastGazLogs'=> $lastGazLogs,
                    ]);
                    
            }
            catch (\Exception $ex) {
            
                return response()->json([
                    'status' => false,
                    'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                    'error' => $ex,

                    
                ]);
            }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        // فييييين ال RETURN ???????????????????
        try
        {
            $citizen = Citizen::find($request -> citizenId);
            $lastGazLogs=gaz_Logs::where('allowBookig','1')->where('agent_id',$citizen->observer->agent_id)->latest('id')->first();
            $days='true'; 
            $numdays='0';
            $lastRequest=logs_Booking::where('citizen_id',$request -> citizenId)->latest('id')->first();
            if($lastRequest) // if have record
            {
                $numdays=date_diff($lastRequest->created_at,now()); // get Number Days Between Reciving_date and current Date
                $numdays->days > '14' ? $days='true' : $days='false';
            }
            else 
            $days='true'; // if no have records

           if($lastGazLogs) // if has records
           {
                if($lastGazLogs->qtyRemaining > '0' && $days=='true')  
                {  
                   
                        return response()->json([
                            'status' => true,
                            'msg' => 'asds',
                            'lastGazLogs'=>$lastGazLogs,
                            'lastRequest'=>$lastRequest,
                              //for Test
                             
                        ]);
                }
                else
                {
                        return response()->json([
                            'status' => false,
                          //  'msg' => 'allowBooking=1 , qtyRemaining='.$lastGazLogs->qtyRemaining.' , 
                             
                            'lastGazLogs'=>$lastGazLogs,
                        ]);
                }
           }
           else // if no have records
           {
                return response()->json([
                    'status' => false,
                    
                    'lastGazLogs'=>$lastGazLogs->id,
                ]);
           }
      
            
            
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in indexxxxxxqw',
               'exceptionerrore'=>$ex,
               'asd' => $lastGazLogs,
           ]);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    }
}
