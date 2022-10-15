<?php


namespace App\Http\Controllers\dashborad\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\requestsGazLogs;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\gazLogs;
use App\Models\Rigon;
use App\Models\Station;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class gazLogsController extends Controller
{
   
    public function index()
    {
    
        try
            {
            
                $data['directorates']=Directorate::select('id','dirName')->whereHas('rigon')->whereHas('agent')->orderby('id','DESC')->get();
                $data['stations']=Station::select('id','staName')->orderby('id','DESC')->get();
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
                     ])->select('id','dirId','rigId','staId','agentId')->orderby('id','DESC')->get();
                     
                return view('dashboard.admin.gazLogs.index',$data);
            }
        catch (\Exception $ex)
                {
                return response()->json([
                    'status'          => false,
                    'msg'             => 'error in function index',
                    'exceptionError'  =>$ex,
                ]);
            }

        
    }

    public function showRigons(Request $request)
    {
         try
           {
       
                $rigons = Rigon::select('id','rigName')->where('dirId',$request->dirId)->whereHas('agent')->get();
                if($rigons)
                return response()->json([
                    'status' => true,
                    'rigons' => $rigons,
                ]);
           }
        catch (\Exception $ex)
            {
                return response()->json([
                    'status'            => false,
                    'msg'               => 'error in function showRigons',
                    'exceptionError'    => $ex,
                ]);
            }
    }
    public function showAgents(Request $request)
    {
        try
          {
        
                $agents = Agent::select('id','agentName')->where('rigId',$request->rigId)->orderby('id','DESC')->get();
                
                if($agents)
                return response()->json([
                    'status' => true,
                    'agents' => $agents,
                ]);
          }
        catch (\Exception $ex)
            {
                return response()->json([
                    'status'           => false,
                    'msg'              => 'error in function showAgents',
                    'exception Error'  =>$ex,
                ]);
            }
    }
    
    
       
    public function store(requestsGazLogs $request)
    {
        try 
            { 
                $gazLog = gazLogs::create([
                    'qty'            => $request->qty,
                    'dirId'          => $request->dirId,
                    'rigId'          => $request->rigId,
                    'staId'          => $request->staId,
                    'agentId'        => $request->agentId,
                    'qtyRemaining'   => $request->qty,
                    'notice'         => $request->notice, 
                    'created_at'     => $request->created_at,

                ]);

                $gazLog->save();
                $lastGazLog =gazLogs::with(
                [
                   'station'=>function($q)
                   {
                     $q->select('id','staName')->get();
                   }
                   ,'agent'=>function($q)
                   {
                     $q->select('id','agentName')->get();
                   }
                   ,'directorate'=>function($q)
                   {
                     $q->select('id','dirName')->get();
                   }
                   ,'rigon'=>function($q)
                   {
                     $q->select('id','rigName')->get();
                   }
                 ])->select('id','dirId','rigId','staId','agentId')->get()->last();

                if ($gazLog)
                return response()->json([
                    'status'       => true,
                    'alertType'    => '.alertSuccess',
                    'msg'          => 'تم ترحيل الدفعه بنجاح',
                    'lastGazLog'   => $lastGazLog,

                ]);
            }
        catch (\Exception $ex) 
            {

                return response()->json([
                    'status'          => false,
                    'msg'             => 'فشل ترحيل الدفعه برجاء المحاوله مجددا',
                    'alertType'       => '.alertError',
                    'exceptionError'  => $ex,                
                
                ]);
            }
    }

    public function edit(Request $request)
    {
        try
           {
                
                $gazLog = gazLogs::with(
                    [
                       'station'=>function($q)
                       {
                         $q->select('id','staName')->get();
                       }
                       ,'agent'=>function($q)
                       {
                         $q->select('id','agentName')->get();
                       }
                       ,'directorate'=>function($q)
                       {
                         $q->select('id','dirName')->get();
                       }
                       ,'rigon'=>function($q)
                       {
                         $q->select('id','rigName')->get();
                       }
                     ])->select('id','qty','notice','dirId','rigId','staId','agentId','created_at')->find($request->gazLogId);      // search in given table id only
                   
                   if (!$gazLog)
                    return response()->json([
                        'status' => false,
                        'alertType'=> '.alertError',
                        'msg' => 'هذ العرض غير موجود',
                        
                      ]);
                      
                      return response()->json([
                        'status' => true,
                        'gazLog' => $gazLog,
                    
                    ]); 
           }
          catch (\Exception $ex) 
                {
                    return response()->json([
                        'status'          => false,
                        'msg'             => 'Error In Function Edit',
                        'exceptionError'  => $ex,

                    ]);
                }
    }

    public function update(requestsGazLogs $request)
    {
        try
            {
                $gazLog = gazLogs::find($request -> id);

                if (!$gazLog)
                    return response()->json([
                        'status' => false,
                        'msg' => 'Error in function Update This Row Not Found',
                    ]);
            
                //update data  
                $gazLog->update($request->except('_token'));
                $lastGazLogUpdate=gazLogs::with(
                    [
                       'station'=>function($q)
                       {
                         $q->select('id','staName')->get();
                       }
                       ,'agent'=>function($q)
                       {
                         $q->select('id','agentName')->get();
                       }
                       ,'directorate'=>function($q)
                       {
                         $q->select('id','dirName')->get();
                       }
                       ,'rigon'=>function($q)
                       {
                         $q->select('id','rigName')->get();
                       }
                     ])->select('id','dirId','rigId','staId','agentId')->find($request->id);
    
                return response()->json([
                    'status'           => true,
                    'alertType'=> '.alertSuccess',
                    'msg'              => 'تم  التحديث بنجاح',
                    'lastGazLogUpdate' => $lastGazLogUpdate,
                ]);

            }
        catch (\Exception $ex) 
            {
                return response()->json([
                    'status'         => false,
                    'msg'            => 'Error In Function Update',
                    'exceptionError' => $ex,
                ]);
            }
    }

 
    public function destroy(Request $request)
    {
        try 
            {
                $gazLog = gazLogs::find($request -> gazLogId); 

                if (!$gazLog)
                return response()->json([
                    'status' => false,
                    'msg' => 'Error In Function destroy',
                ]);

                $gazLog->delete();

                return response()->json([
                    'status' => true,
                    'alertType'=> '.alertSuccess',
                    'msg' => 'تم حذف الدفعه بنجاح',
                    'id' => $request -> gazLogId
                ]);
            } 
         catch (\Exception $ex) 
            {
                return response()->json([
                    'status'          => false,
                    'msg'             => 'Error In Function destroy',
                    'exception Error' => $ex,
                ]);
            
            }
    }
    public function search(Request $request)
    {
        
        try
        { 

                 if($request->filterGazLogsSearch=='all')
                    $resultSearch=gazLogs::with(
                      [
                         'station'=>function($q)
                         {
                           $q->select('id','staName')->get();
                         }
                         ,'agent'=>function($q)
                         {
                           $q->select('id','agentName')->get();
                         }
                         ,'directorate'=>function($q)
                         {
                           $q->select('id','dirName')->get();
                         }
                         ,'rigon'=>function($q)
                         {
                           $q->select('id','rigName')->get();
                         }
                       ])->select('id','dirId','rigId','staId','agentId')
                       ->where('id','Like','%'.$request->textGazLogsSearch.'%')
                       ->orwherehas
                        (
                            'station',function($q) use($request)
                                {
                                    $q->where('staName','Like','%'.$request->textGazLogsSearch.'%');
                                }
                        )
                       ->orwherehas
                        (
                            'agent',function($q) use($request)
                                {
                                    $q->where('agentName','Like','%'.$request->textGazLogsSearch.'%');
                                }
                        )
                        ->orwherehas
                        (
                            'directorate',function($q) use($request)
                                {
                                    $q->where('dirName','Like','%'.$request->textGazLogsSearch.'%');
                                }
                        )
                        ->orwherehas
                        (
                            'rigon',function($q) use($request)
                            {
                                $q->where('rigName','Like','%'.$request->textGazLogsSearch.'%');
                            }
                        )
                       ->get();

                   else if($request->filterGazLogsSearch=='staName')
                      $resultSearch=gazLogs::with(
                        [
                           'station'=>function($q)
                           {
                             $q->select('id','staName')->get();
                           }
                           ,'agent'=>function($q)
                           {
                             $q->select('id','agentName')->get();
                           }
                           ,'directorate'=>function($q)
                           {
                             $q->select('id','dirName')->get();
                           }
                           ,'rigon'=>function($q)
                           {
                             $q->select('id','rigName')->get();
                           }
                         ])
                         ->select('id','dirId','rigId','staId','agentId')
                         ->orwherehas
                         (
                             'station',function($q) use($request)
                                 {
                                     $q->where('staName','Like','%'.$request->textGazLogsSearch.'%');
                                 }
                         )->get();
                        

                   else if($request->filterGazLogsSearch=='numberId')
                      $resultSearch=gazLogs::with(
                        [
                           'station'=>function($q)
                           {
                             $q->select('id','staName')->get();
                           }
                           ,'agent'=>function($q)
                           {
                             $q->select('id','agentName')->get();
                           }
                           ,'directorate'=>function($q)
                           {
                             $q->select('id','dirName')->get();
                           }
                           ,'rigon'=>function($q)
                           {
                             $q->select('id','rigName')->get();
                           }
                         ])->select('id','dirId','rigId','staId','agentId')
                         ->where('id','Like','%'.$request->textGazLogsSearch.'%')->get();
                        

                    else if( $request->filterGazLogsSearch=='dirName' )
                      $resultSearch=gazLogs::with(
                      [
                         'station'=>function($q)
                         {
                           $q->select('id','staName')->get();
                         }
                         ,'agent'=>function($q)
                         {
                           $q->select('id','agentName')->get();
                         }
                         ,'directorate'=>function($q)
                         {
                           $q->select('id','dirName')->get();
                         }
                         ,'rigon'=>function($q)
                         {
                           $q->select('id','rigName')->get();
                         }
                       ])->select('id','dirId','rigId','staId','agentId')
                        ->wherehas
                        (
                            'directorate',function($q) use($request)
                                {
                                    $q->where('dirName','Like','%'.$request->textGazLogsSearch.'%');
                                }
                        )->get();      

                    else if( $request->filterGazLogsSearch=='rigName' )
                      $resultSearch=gazLogs::with(
                      [
                         'station'=>function($q)
                         {
                           $q->select('id','staName')->get();
                         }
                         ,'agent'=>function($q)
                         {
                           $q->select('id','agentName')->get();
                         }
                         ,'directorate'=>function($q)
                         {
                           $q->select('id','dirName')->get();
                         }
                         ,'rigon'=>function($q)
                         {
                           $q->select('id','rigName')->get();
                         }
                       ])->select('id','dirId','rigId','staId','agentId')
                        ->wherehas
                        (
                            'rigon',function($q) use($request)
                                {
                                    $q->where('rigName','Like','%'.$request->textGazLogsSearch.'%');
                                }
                        )->get();      

                    else if( $request->filterGazLogsSearch=='agentName' )
                      $resultSearch=gazLogs::with(
                      [
                         'station'=>function($q)
                         {
                           $q->select('id','staName')->get();
                         }
                         ,'agent'=>function($q)
                         {
                           $q->select('id','agentName')->get();
                         }
                         ,'directorate'=>function($q)
                         {
                           $q->select('id','dirName')->get();
                         }
                         ,'rigon'=>function($q)
                         {
                           $q->select('id','rigName')->get();
                         }
                       ])->select('id','dirId','rigId','staId','agentId')
                        ->wherehas
                        (
                            'agent',function($q) use($request)
                                {
                                    $q->where('agentName','Like','%'.$request->textGazLogsSearch.'%');
                                }
                        )->get();                  
                
            if ($resultSearch)
                return response()->json
                (
                    [
                        'status'        => true,
                        'msg'           => 'تم الحفظ بنجاح', 
                        'resultSearch'  =>  $resultSearch,
                        //'Photo'       => $resultSearch->Photo,
                    ]
                );
 
        }
        catch (\Exception $ex)
         {
            return response()->json([
                'status'             => false,
                'msg'                => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError'     => $ex,
            ]);
         }
    }


}
