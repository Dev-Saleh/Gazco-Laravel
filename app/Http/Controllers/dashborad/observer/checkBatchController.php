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
                    )->select('id','dirId','rigId','staId','agentId','validOfSell','created_at')->where(
                    [
                        ['validOfSell','1']
                       ,['allowBooking','0']
                       ,['qtyRemaining','>','0']
                       ,['agentId',$observer->agentId]
                    ])->get();
                   
                    return view('dashboard.observer.checkBatch.index',$data);
                
                }
                catch (\Exception $ex)
                {
                    return response()->json(
                    [
                        'status'         => false,
                        'msg'            => 'error In Function Index',
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
                )->select('id','dirId','rigId','staId','agentId','validOfSell','qty','created_at')->where(
                    [
                         ['validOfSell','1']
                        ,['allowBooking','0']
                        ,['qtyRemaining','>','0']
                    ]
                )->find($request -> checkBatchId);  // search in given table id only
          
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

                  $obs=Observer::find($request->obsId); 
                  // الخظوه الاوله : نستعلم على اخر كشف 
                  $lastGazLogs=gazLogs::where([['allowBooking','1'],['validOfSell','1']])->where(
                   [
                       ['agentId',$obs->agentId]
                      ,['qtyRemaining','>','0']
                   ])->latest()->first();
                 
                  if($lastGazLogs)
                    {
                            return response()->json(
                            [
                                'status' => true,
                                'warring' => 'هناك كميه مفتوحة الحجز',      
                            ]);
                    }
                  else
                    {
                        $gazLog = gazLogs::find($request -> gazLogId)->update(
                            [
                                'allowBooking'=>'1',
                                'validOfSell' =>'0' 
                            ]);  // نتاكذا من الكشف المرسل هل هو موجد في جدول الكشوفات
                    
                            if (!$gazLog) // هذا الشرط اذا الكشف المرسل لا نرسل رساله حظاء
                                return response()->json(
                                [
                                    'status'     => false,
                                    'msg'        => 'This gaz Log Not Found Error In Function Update',
                                    'gazLogId'   => $request -> gazLogId, //for Test
                                ]);

                                return response()->json(
                                [
                                    'status'   => true,
                                    'gazLog'   => $gazLog, //for Test
                                    'gazLogId' => $request -> gazLogId, ////For Delete Row Form Table
                                ]); 
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
