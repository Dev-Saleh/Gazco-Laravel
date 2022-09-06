<?php

namespace App\Http\Controllers\front;

use App\Events\newBooking;
use App\Http\Controllers\Controller;

use App\Models\Agent;
use App\Models\Citizen;
use App\Models\Directorate;
use App\Models\gaz_Logs;
use App\Models\gazLogs;
use App\Models\logs_Booking;
use App\Models\logsBooking;
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
                return response()->json(
                [
                    'status'         => false,
                    'msg'            => 'Error In Function Index',
                    'exceptionError' => $ex,
                ]);
          }
    }
 

    public function store(Request $request)
    {
         try
          { 
              
                $logsbooking =logsBooking::create(
                 [
                    'statusBooking'   =>'0',
                    'citId'           =>$request->citId,
                    'numBatch'        =>$request->numBatch,
                    'created_at'      =>now() // ???????????????????/
                 ]
                 );
               $logsbooking->save();

               $citizen = Citizen::find($request -> citId); //??????????
               $lastGazLogs=gazLogs::where('allowBooking','1')->where('agentId',$citizen->observer->agentId)->latest('id')->first();   
               event(new newBooking( $lastGazLogs));
               
               if ($logsbooking)
                    return response()->json(
                     [
                        'status'       => true,
                        'msg'          => 'تم الحفظ بنجاح',
                        'lastGazLogs'  => $lastGazLogs,
                     ]
                    );
                    
            }
            catch (\Exception $ex) 
                {
                
                    return response()->json(
                        [
                            'status'         => false,
                            'msg'            => 'Error In Function Store Booking',
                            'exceptionError' => $ex,     
                        ]
                     );
                }
       
    }

  
    public function show(Request $request)
    {   
        // فييييين ال RETURN ???????????????????
        try
            {
                    $citizen = Citizen::find($request -> citId);
                    $lastGazLogs=gazLogs::where('allowBooking','1')->where('agentId',$citizen->observer->agentId)->latest('id')->first();
                    $days='true'; 
                    $numdays='0';
                    $lastRequest=logsBooking::where('citid',$request -> citId)->latest('id')->first();
                   
                    if($lastRequest) // if have record
                    {
                        $numdays=date_diff($lastRequest->created_at,now()); // get Number Days Between Reciving_date and current Date
                        $numdays->days > '14' ? $days='true' : $days='false';
                    }

                    else  $days='true'; // if no have records

                if($lastGazLogs) // if has records
                {
                        if($lastGazLogs->qtyRemaining > '0' && $days=='true')  
                        {  
                        
                                return response()->json(
                                [
                                    'status' => true,
                                    'msg' => 'asds',
                                    'lastGazLogs'=>$lastGazLogs,
                                    'lastRequest'=>$lastRequest,
                                    //for Test
                                    
                                ]);
                        }
                        else
                        {
                                return response()->json(
                                [
                                    'status' => false,
                                //  'msg' => 'allowBooking=1 , qtyRemaining='.$lastGazLogs->qtyRemaining.' ,
                                    'lastGazLogs'=>$lastGazLogs,
                                ]);
                        }
                }
                else if (!$lastGazLogs && $days=='true') // if no have records
                {
                        return response()->json(
                        [
                            'status' => false,
                            'lastGazLogs'=>$lastGazLogs->id,
                        ]);
                }
            
                    
                    
        }
       catch (\Exception $ex)
         {
            return response()->json(
            [
                'status'          => false,
                'msg'             => 'Error In Function Show',
                'exceptionErrore' => $ex,
                'lastGazLogs'     => $lastGazLogs,
             ]);
         }
    }

   }
