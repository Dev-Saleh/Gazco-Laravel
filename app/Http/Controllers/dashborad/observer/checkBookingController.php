<?php
namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use App\Events\statusBooking;
use App\Listeners\changeStatusBooking;
use App\Models\Citizen;
use App\Models\gazLogs;
use App\Models\logsBooking;
use App\Models\Observer;
use Illuminate\Http\Request;

class checkBookingController extends Controller
{
   
    public function index(Request $request)
    {
      try
        {
       
                $observer=Observer::find($request->id);
                $data['gazLogs']=gazLogs::select('id','created_at')->where('allowBooking','1')->where('qtyRemaining','0')->where('agentId',$observer->agentId)->get();
                
                return view('dashboard.observer.checkBooking.index',$data);
        }
    catch (\Exception $ex)
        {
            return response()->json(
                [
                    'status'         => false,
                    'msg'            => 'Error In Function Index1',
                    'exceptionError' => $ex,
                ]  
            );
        }
    
    }
    

   
    public function show(Request $request)
    {
        try
            {
              
                $showLogBookingsCitizen=logsBooking::with(
                    [
                      'citizen'=>function($q)
                        {
                            $q->select('id','citizenName','mobileNum');
                        }
                    ]
                )->where('NumBatch',$request->gazLogId)->get();
               
              if($showLogBookingsCitizen)
                {
                    return response()->json(
                    [
                        'status'                 => true,
                        'msg'                    => 'success in index',
                        'showLogBookingsCitizen' => $showLogBookingsCitizen,
                    ]
                    );
                }
            }
        catch (\Exception $ex)
            {
                return response()->json(
                [
                    'status'         => false,
                    'msg'            => 'Error In Function Show',
                    'exceptionError' => $ex,
                ]
                );
            }
    }

   
    public function update(Request $request)
    {  
        try
            {
                $logBooking=logsBooking::find($request->logBookingId);
                
                if( $logBooking )
                {
                   
                    event(new statusBooking( $logBooking));
                    
                    return response()->json([
                        'status' => true,
                        'msg' => 'Update',
                    ]);
                }

            }
         catch (\Exception $ex)
            {
                return response()->json(
                [
                    'status'          => false,
                    'msg'             => 'error in index',
                    'exceptionError'  => $ex,
                ]);
            }
    }
}
