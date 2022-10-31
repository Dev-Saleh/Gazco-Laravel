<?php
namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use App\Models\Citizen;

use App\Models\gazLogs;
use App\Models\Observer;
use Illuminate\Http\Request;

class checkBatchController extends Controller
{
    
    
  public function index(Request $request)

   {
                try
                {
                    
                    $observer=Observer::find(session()->get('obsId'));
                    $data['observers']= $observer;

                    $data['gazLogs']=gazLogs::with(
                    [
                        'station'=>function($q)
                        {
                            $q->select('id','staName');
                        }
                        ,'agent'=>function($q)
                        {
                            $q->select('id','agentName');
                        }
                        ,'directorate'=>function($q)
                        {
                            $q->select('id','dirName');
                        }
                        ,'rigon'=>function($q)
                        {
                            $q->select('id','rigName');
                        }
                    ]
                    )->select('id','dirId','rigId','staId','agentId','statusBatch','created_at')
                    ->where('agentId',$observer->agentId)
                    ->orderByDesc('id')
                    ->get();
                   
                    return view('dashboard.observer.checkBatch.index',$data);
                
                }
                catch (\Exception $ex)
                {
                    return response()->json(
                    [
                        'status'         => false,
                        'msg'            => 'ASD',
                        'exceptionError' => $ex,
                    ]);
                }
                
   }

    
    public function show(Request $request)
    {
        try
          {

            $gazLog = gazLogs::with(
                [
                    'station'=>function($q)
                    {
                        $q->select('id','staName');
                    }
                    ,'agent'=>function($q)
                    {
                        $q->select('id','agentName');
                    }
                    ,'directorate'=>function($q)
                    {
                        $q->select('id','dirName');
                    }
                    ,'rigon'=>function($q)
                    {
                        $q->select('id','rigName');
                    }
                ]
                )->select('id','dirId','rigId','staId','agentId','qty','qtyRemaining','created_at')->find($request -> checkBatchId);  // search in given table id only
          
                if (!$gazLog)
                return response()->json(
                    [
                        'status'  => false,
                        'msg'     =>'Not Found Any Batch In table gaz Log',
                   
                    ]
                );
    
                return response()->json(
                    [
                        'status' => true,
                        'gazLog' => $gazLog,
                    ]
                );
         }
          catch(\Exception $ex)
            {
                    return response()->json(
                        [
                            'status'          => false,
                            'msg'             => 'Error In Function Show',
                            'ExceptionError ' => $ex,
                       ]
                );
            }
    }

    public function update(Request $request)
    {
      try
            {
                
                $gazLog = gazLogs::find($request -> gazLogId);

                if($gazLog->statusBatch=='2')

                        return response()->json(
                        [
                            'status' => false,
                            'msg' => 'هذه الدفعه مفتوحة الحجز بالفعل',  
                            'alertType'        => '.alertWarning',    
                        ]);

                else if($gazLog->statusBatch=='3')

                    return response()->json(
                        [    'status' => false,
                            'msg' => 'تم نفاد الكميه',  
                            'alertType'        => '.alertWarning',      
                        ]);

                else if($gazLog->statusBatch=='1')

                 {
                        $obs=Observer::find($request->obsId); 
                        // الخظوه الاوله : نستعلم على اخر كشف 
                        $lastBatchOpenBooking=gazLogs::where('statusBatch','2')->where(
                        [
                            ['agentId',$obs->agentId]
                            ,['qtyRemaining','>','0']
                        ])->latest()->first();
                    
                            
                        if($lastBatchOpenBooking)
                            return response()->json(
                            [
                                'status' => false,
                                'msg' => 'هناك دفعه مفتوحة الحجز',  
                                'alertType'        => '.alertWarning',     
                            ]);
                    
                            
                          else
                            {
                                $gazLog = gazLogs::find($request -> gazLogId);     
                                $gazLog->statusBatch='2';
                                $gazLog->update();
                                // نتاكذا من الكشف المرسل هل هو موجد في جدول الكشوفات
                            
                                    if (!$gazLog) // هذا الشرط اذا الكشف المرسل لا نرسل رساله حظاء
                                        return response()->json(
                                        [
                                            'status'     => false,
                                            'msg'        => 'لا يوجد دفعه بهذا الرقم',
                                            'gazLogId'   => $request -> gazLogId, //for Test
                                        ]);

                                        return response()->json(
                                        [
                                            'status'     => false,
                                            'msg'        => 'تم فتح الحجز بنجاح',
                                            'alertType'        => '.alertWarning',
                                        ]); 
                            }
                    
                    }
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
