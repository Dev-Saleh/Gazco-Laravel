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
use App\Models\profile;
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
          {     $profile = profile::select()->first();
              
                date_default_timezone_set('Etc/GMT-3');
               
               $date = now();
               $citizen = Citizen::find($request -> citId); 
               $citizen->unblockDate= date_add($date,date_interval_create_from_date_string($profile->numDaysBookingValid." days"));
               $citizen->update();
               $lastGazLogs=gazLogs::where('statusBatch','2')->where('agentId',$citizen->observer->agentId)->latest('id')->first();   
               event(new newBooking( $lastGazLogs));
               $logsbooking =logsBooking::create(
                [
                   'statusBooking'   =>'0',
                   'citId'           =>$request->citId,
                   'numBatch'        =>$request->numBatch,
                   'created_at'      =>now(),
                ]
                );
               $logsbooking->save();

               if ($logsbooking)
                    return response()->json(
                     [
                        'status'       => true,
                        'alertType'=> '.alertSuccess',
                        'msg'          => 'تم تسجيلك بنجاح 😁👍',
                        'lastGazLogs'  => $lastGazLogs,
                        'unblockDate'  =>  $citizen->unblockDate,
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
         {          $profile = profile::select()->first();
                    $citizen = Citizen::find($request -> citId);
                    // $asd = date_diff($citizen->unblockDate,now());
                    $lastBatchOpenBooking=gazLogs::where('statusBatch','2')->where('agentId',$citizen->observer->agentId)->latest('id')->first();
                    $citizenBookingValid=''; 
                    $numdays='0';
                    $lastRequestBookingtocitz=logsBooking::where('citid',$request -> citId)->latest('id')->first();
                   
                    if($lastRequestBookingtocitz) // if have record
                    {
                        $numdays=date_diff($lastRequestBookingtocitz->created_at,now()); // get Number Days Between Reciving_date and current Date
                        $numdays->format('%R%a') > $profile->numDaysBookingValid ? $citizenBookingValid='true' : $citizenBookingValid='false';
                    }

                    else  $citizenBookingValid='true'; // if no have records

                   


                if( $lastBatchOpenBooking && $citizenBookingValid=='true' ) // if has records
                {
                        if( $lastBatchOpenBooking->qtyRemaining > '0'  )  
                        {  
                        
                                return response()->json
                                (
                                    [
                                        'status'       => true,
                                        'msg'          => '1',   //1='مصرح لك بالحجز' 
                                        'lastGazLogs'  => $lastBatchOpenBooking,
                                        'validDays'    => $profile->numDaysBookingValid,
                                            
                                    ]
                                );
                        }
                       
                }
                else if($lastBatchOpenBooking && $citizenBookingValid=='false')
                {   
                   
                    return response()->json(
                        [
                            'status' => false,
                            'msg' => '2', //2='انت محظور يا حلو' 
                            'validDays'=> $profile->numDaysBookingValid,
                            'unblockDate'  =>  $citizen->unblockDate,   
                            'd'=> $numdays->d,
                            'h'=> $numdays->h,
                            'm'=> $numdays->m,
                            's'=> $numdays->s,
                            // 'full'=> $asd,
                        ]);
                }
                else if(!$lastBatchOpenBooking && $citizenBookingValid=='true' || $citizenBookingValid=='false' )
                {
                        return response()->json(
                        [
                            'status' => false,
                            'msg' =>'3',   //3='لايوجد كمية مفتوحة الحجز'
                            'validDays'=> $profile->numDaysBookingValid,
                            'last'=>$citizenBookingValid,               
                        ]);
                }
                
     
            
                    
                    
        }
       catch (\Exception $ex) 
         {
            return response()->json
            (
                [
                    'status'          => false,
                    'msg'             => 'Error In Function Show',
                    'exceptionErrore' => $ex,
                    'lastGazLogs'     => $lastBatchOpenBooking,
                    'validDays'       => $profile,
                ]
            );
         }
    }

   }
