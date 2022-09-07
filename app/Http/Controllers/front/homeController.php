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
               $lastGazLogs=gazLogs::where('statusBatch','2')->where('agentId',$citizen->observer->agentId)->latest('id')->first();   
               event(new newBooking( $lastGazLogs));
               
               if ($logsbooking)
                    return response()->json(
                     [
                        'status'       => true,
                        'alertType'=> '.alertSuccess',
                        'msg'          => 'تم تسجيلك بنجاح 😁👍',
                        'lastGazLogs'  => $lastGazLogs,
                     ]
                    );
                    
            }
            catch (\Exception $ex) 
                {
                
                    return response()->json(
                        [
                            'status'         => false,
                            'alertType'=> '.alertError',
                            'msg'            => 'فشلت عملية حجز الدبه',
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
                    $lastBatchOpenBooking=gazLogs::where('statusBatch','2')->where('agentId',$citizen->observer->agentId)->latest('id')->first();
                    $days='true'; 
                    $numdays='0';
                    $lastRequestBookingtocitz=logsBooking::where('citid',$request -> citId)->latest('id')->first();
                   
                    if($lastRequestBookingtocitz) // if have record
                    {
                        $numdays=
                        
                        date_diff($lastRequestBookingtocitz->created_at,now()); // get Number Days Between Reciving_date and current Date
                        $numdays->days > '14' ? $days='true' : $days='false';
                    }

                    else  $days='true'; // if no have records

                if($lastBatchOpenBooking && $days=='true') // if has records
                {
                        if($lastBatchOpenBooking->qtyRemaining > '0' )  
                        {  
                        
                                return response()->json(
                                [
                                    'status'     => true,
                                    'msg'        => '1',   //1='مصرح لك بالحجز' 
                                    'lastGazLogs'=>$lastBatchOpenBooking,
                                    'lastRequest'=>$lastRequestBookingtocitz,
                                    //for Test
                                    
                                ]);
                        }
                        else if ($lastBatchOpenBooking->qtyRemaining == '0' )
                        {
                                return response()->json(
                                [
                                    'status' => false,
                                    'msg' => '2', //2='لاتوجد كمية الحجز' 
                                    'lastGazLogs'=>$lastBatchOpenBooking,
                                ]);
                        }
                       
                }
<<<<<<< HEAD
                else if(!$lastBatchOpenBooking && $days=='true')
=======
                else if(!$lastBatchOpenBooking && $days=='true' || $days=='false' )
>>>>>>> 71133158e55ec10634afb118ef16124fdad5aeb3
                {
                        return response()->json(
                        [
                            'status' => false,
                            'msg' =>'3',   //1='لايوجد كمية مفتوحة الحجز'
                            //'lastGazLogs'=>$lastBatchOpenBooking,
                        ]);
                }
                else if($lastBatchOpenBooking && $days=='false')
                {
                    return response()->json(
                        [
                            'status' => false,
                            'msg' => '4', //4='انت محظور يا حلو' 
                            'lastGazLogs'=>$lastBatchOpenBooking,
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
                'lastGazLogs'     => $lastBatchOpenBooking,
             ]);
         }
    }

   }
