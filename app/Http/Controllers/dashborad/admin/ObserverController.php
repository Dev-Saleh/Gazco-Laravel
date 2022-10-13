<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\Observer;
use App\Models\Rigon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class ObserverController extends Controller
{
   
    public function index()
    {
        
        try
        {
           
           $data['directorates']=Directorate::whereHas('rigon')->select('id','dirName')->orderby('id','DESC')->get();
           
           $data['observers']=Observer::with(
            [
               'directorate'=>function($q)
               {
                  $q->select('id','dirName')->get();
               },

                'rigon'=>function($q)
                {
                    $q->select('id','rigName')->get();
                },

                'agent'=>function($q)
                {
                    $q->select('id','agentName')->get();
                }
            ]
           )->select('id','obsName','dirId','rigId','agentId')->orderby('id','DESC')->get();
           
           return view('dashboard.admin.observers.index',$data);
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status'          => false,
               'msg'             => 'error in index',
               'exceptionError'  =>$ex,
           ]);
        }

        
    }
    public function showRigons(Request $request)
    {
        try
        {
       
           $rigons = Rigon::select('id','rigName')->where('dirId',$request->dirId)->get();

           if($rigons)
           return response()->json([
            'status' => true,
            'rigons' => $rigons,
           ]);

        }
       catch (\Exception $ex)
        {
           return response()->json([
               'status'         => false,
               'msg'            => 'error in showRigons',
               'exceptionError' => $ex,
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
               'status'          => false,
               'msg'             => 'error in showAgents',
               'exceptionError'  => $ex,
           ]);
       }
    }

    public function storeObservers(Request $request)
    {
        try
         { 
            $obs = Observer::create($request->except('_token'));
            $obs->save();
            $lastobserver = Observer::with(
                [
                   'directorate'=>function($q)
                   {
                      $q->select('id','dirName')->get();
                   },
    
                    'rigon'=>function($q)
                    {
                        $q->select('id','rigName')->get();
                    },
    
                    'agent'=>function($q)
                    {
                        $q->select('id','agentName')->get();
                    }
                ]
               )->select('id','obsName','dirId','rigId','agentId')->get()->last();
               if (!$obs)
               return response()->json([
                   'status' => true,
                   'msg' => 'تم تسجيل المراقب بنجاح',
                   'alertType'=> '.alertSuccess',
                   'lastObserver'=> $lastobserver,
               ]);      
            if ($obs)
            return response()->json([
                'status' => true,
                'msg' => 'تم تسجيل المراقب بنجاح',
                'alertType'=> '.alertSuccess',
                'lastObserver'=> $lastobserver,
            ]);
        }
        catch (\Exception $ex) {
            return response()->json([
                'status'         => false,
                'alertType'=> '.alertError',
                'msg'            => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
        }
    }

    public function showAllObservers()
    {
        try
        {
           
            $observers=Observer::with(
                [
                   'directorate'=>function($q)
                   {
                      $q->select('id','dirName')->get();
                   },
    
                    'rigon'=>function($q)
                    {
                        $q->select('id','rigName')->get();
                    },
    
                    'agent'=>function($q)
                    {
                        $q->select('id','agentName')->get();
                    }
                ]
               )->select('id','obsName','dirId','rigId','agentId')->get();
               
           if($observers)
           return response()->json([
            'status' => true,
            'observers' => $observers,
           ]);

       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status'         => false,
               'msg'            => 'error in showAll',
               'exceptionError' =>$ex,
           ]);
       }
    }

    
    public function editObservers(Request $request)
    {
        try
        {
            $observer = Observer::with(
                [
                   'directorate'=>function($q)
                   {
                      $q->select('id','dirName')->get();
                   },
    
                    'rigon'=>function($q)
                    {
                        $q->select('id','rigName')->get();
                    },
    
                    'agent'=>function($q)
                    {
                        $q->select('id','agentName')->get();
                    }
                ]
               )->select('id','obsName','obsUserName','obsPassword','obsWhatsNum','dirId','rigId','agentId')->find($request->obsId); // search in given table id only
            if (!$observer)
                return response()->json([
                    'status' => false,
                    'alertType'=> '.alertError',
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);

            return response()->json([
                'status' => true,
                'obs' => $observer,
               
            ]); 

          }
          catch (\Exception $ex) 
          {
            return response()->json([
                'status'         => false,
                'msg'            => 'فشل بالتعديل برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
          }
    }

   
    public function updateObservers(Request $request)
    {
        try
        {
            $observer = Observer::find($request -> id);
            if (!$observer)
                return response()->json([
                    'status' => false,
                    'alertType'=> '.alertError',
                    'msg' => 'هذ العرض غير موجود',
                ]);
         
            //update data  
            $observer->update($request->except('_token'));
            $lastobserverUpdate = Observer::with(
                [
                   'directorate'=>function($q)
                   {
                      $q->select('id','dirName')->get();
                   },
    
                    'rigon'=>function($q)
                    {
                        $q->select('id','rigName')->get();
                    },
    
                    'agent'=>function($q)
                    {
                        $q->select('id','agentName')->get();
                    }
                ]
               )->select('id','obsName','obsPassword','dirId','rigId','agentId')->find($request->id);
         
            return response()->json([
                'status'             => true,
                'alertType'=> '.alertWarning',
                'msg'    => 'تم تعديل المراقب بنجاح',
                'lastobserverUpdate' => $lastobserverUpdate,
                'obsId'              => $request->id,
            ]);
        }
        catch (\Exception $ex) 
        {

            return response()->json([
                'status'         => false,
                'msg'            => 'فشل بالتحديث برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
        }
    }

    
    public function destroyObservers(Request $request)
    {
        try 
        {
                $obs = Observer::find($request -> obsId); 
                if (!$obs)
                return response()->json([
                    'status' => false,
                    'msg' => 'فشل بالحدف برجاء المحاوله مجددا',
                ]);
                $obs->delete();
                return response()->json([
                    'status' => true,
                    'msg' => 'تم الحذف بنجاح',
                    'obsId' => $request -> obsId,
            ]);
         } 
         catch (\Exception $ex) 
         {
            return response()->json([
                'status'         => false,
                'msg'            => 'فشل بالحدف برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
          
         }
    }
    public function search(Request $request)
    {
        
        try
        { 
            if($request->filterObsSearch=="all")
            $resultSearch=Observer::with
            (
                [
                    'directorate'=>function($q)
                    {
                        $q->select('id','dirName')->get();
                    },
    
                    'rigon'=>function($q)
                    {
                        $q->select('id','rigName')->get();
                    },
    
                    'agent'=>function($q)
                    {
                        $q->select('id','agentName')->get();
                    }
                ]
            )
                 ->select('id','obsName','obsPassword','dirId','rigId','agentId')
                 ->where('obsName','Like','%'.$request->textObsSearch.'%')
                 ->orwhere('id','Like','%'.$request->textObsSearch.'%')
                 ->orwherehas('directorate',function($q) use($request){$q->where('dirName','Like','%'.$request->textObsSearch.'%');})
                 ->orwherehas('rigon',function($q) use($request){$q->where('rigName','Like','%'.$request->textObsSearch.'%');})
                 ->orwherehas('agent',function($q) use($request){$q->where('agentName','Like','%'.$request->textObsSearch.'%');})
                 ->get();

          else if($request->filterObsSearch=="obsName")
                $resultSearch=Observer::with
                (
                    [
                        'directorate'=>function($q)
                        {
                            $q->select('id','dirName')->get();
                        },
        
                        'rigon'=>function($q)
                        {
                            $q->select('id','rigName')->get();
                        },
        
                        'agent'=>function($q)
                        {
                            $q->select('id','agentName')->get();
                        }
                    ]
                )
                ->select('id','obsName','obsPassword','dirId','rigId','agentId')
                ->where('obsName','Like','%'.$request->textObsSearch.'%')->get();

            else if($request->filterObsSearch=="id")
                $resultSearch=Observer::with
                (
                    [
                        'directorate'=>function($q)
                        {
                            $q->select('id','dirName')->get();
                        },
        
                        'rigon'=>function($q)
                        {
                            $q->select('id','rigName')->get();
                        },
        
                        'agent'=>function($q)
                        {
                            $q->select('id','agentName')->get();
                        }
                    ]
                )
                    ->select('id','obsName','obsPassword','dirId','rigId','agentId')
                    ->where('id','Like','%'.$request->textObsSearch.'%')->get();

                    
            else if($request->filterObsSearch=="dirId")
                $resultSearch=Observer::with
                (
                    [
                      'directorate'=>function($q)
                        {
                            $q->select('id','dirName')->get();
                        },
        
                        'rigon'=>function($q)
                        {
                            $q->select('id','rigName')->get();
                        },
        
                        'agent'=>function($q)
                        {
                            $q->select('id','agentName')->get();
                        }
                    ]
                )
                    ->select('id','obsName','obsPassword','dirId','rigId','agentId')
                    ->wherehas('directorate',function($q) use($request){$q->where('dirName','Like','%'.$request->textObsSearch.'%');})->get();
                
           else if($request->filterObsSearch=="rigId")
                $resultSearch=Observer::with
                (
                  [
                      'directorate'=>function($q)
                        {
                            $q->select('id','dirName')->get();
                        },
        
                       'rigon'=>function($q)
                        {
                            $q->select('id','rigName')->get();
                        },
        
                       'agent'=>function($q)
                        {
                            $q->select('id','agentName')->get();
                        }
                  ]
                )
                  ->select('id','obsName','obsPassword','dirId','rigId','agentId')
                  ->wherehas('rigon',function($q) use($request){$q->where('rigName','Like','%'.$request->textObsSearch.'%');})->get();
                
            else if($request->filterObsSearch="agentId")
                $resultSearch=Observer::with
                (
                    [
                        'directorate'=>function($q)
                        {
                            $q->select('id','dirName')->get();
                        },
        
                        'rigon'=>function($q)
                        {
                            $q->select('id','rigName')->get();
                        },
        
                        'agent'=>function($q)
                        {
                            $q->select('id','agentName')->get();
                        }
                    ]
                )
                  ->select('id','obsName','obsPassword','dirId','rigId','agentId')
                  ->wherehas('agent',function($q) use($request){$q->where('agentName','Like','%'.$request->textObsSearch.'%');})
                  ->get();
             
                if ($resultSearch)
                return response()->json
                (
                  [
                        'status'       => true,
                        'msg'          => 'تم الحفظ بنجاح', 
                        'resultSearch' =>  $resultSearch, 
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
