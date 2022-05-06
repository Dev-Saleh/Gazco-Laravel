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
use PhpParser\Node\Expr\ArrayItem;

class checkBookingController extends Controller
{
   
    public function index(Request $request)
    {
      try
        {
       
                $observer=Observer::find($request->id);
                $data['gazLogs']=gazLogs::select('id','created_at')->where(
                    [
                         ['validOfSell','0']
                        ,['allowBooking','0']
                        ,['qtyRemaining','0']
                        ,['agentId',$observer->agentId]
                    ])->get();
                
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
                            $q->select('id','citName','mobileNum');
                        }
                    ]
                )->select('id','citId','statusBooking')->where('NumBatch',$request->gazLogId)->get();
               
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

   //في داله التحديث لما اكذا استلام كل المواطنين لازم اغير خاصيه صالح البيع في جدول الكشوفات الي 0
    public function update(Request $request)
    {  
        try
            {
            
                   $logBookingsId=[];
                    foreach( $request->logBookingId as $logBookingId)
                        {
                        
                            $update= logsBooking::where([['id',$logBookingId],['statusBooking','0']])->update(['statusBooking'=>'1']);
                            if($update)
                            {
                                $data=logsBooking::with(
                                [
                                    'citizen'=>function($q)
                                        {
                                            $q->select('id','citName','mobileNum');
                                        }
                                ]
                                )->select('id','citId','statusBooking','numBatch')->where('id',$logBookingId)->get();
                               
                                foreach ($data as $key => $value) 
                                {
                                    array_push($logBookingsId,$value);
                                }


                             }
                            }   
                    return response()->json(
                        [
                            'status' => true,
                            'msg'    => 'Update Success',
                            'logBookingsId'=>$logBookingsId,
                        
                        ]);
            
            }
         catch (\Exception $ex)
            {
                return response()->json(
                [
                    'status'          => false,
                    'msg'             => 'Error In Function Update',
                    'exceptionError'  => $ex,
                ]);
            }
    }
}
