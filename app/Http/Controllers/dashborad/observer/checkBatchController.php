<?php
namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\gaz_Logs;
use App\Models\Observer;
use Illuminate\Http\Request;

class checkBatchController extends Controller
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
            $data[]='';
          $observer=Observer::find($request->id);
          $data['observers']= $observer;
          
        $data['gaz_Logs']=gaz_Logs::with([
          'station'=>function($q)
            {
              $q->select('id','Station_name');
            }
           ,'agent'=>function($q)
           {
             $q->select('id','Agent_name');
           }
           ,'directorate'=>function($q)
           {
             $q->select('id','directorate_name');
           }
           ,'rigon'=>function($q)
           {
             $q->select('id','rigon_name');
           }
         ],)->select('id','directorate_id','rigons_id','stations_id','agent_id','validOfSell','created_at')->where('validOfSell',1)->where('agent_id',$observer->agent_id)->get();
         return view('dashboard.observer.checkBatch.index',$data);
       
    }
    catch (\Exception $ex)
     {
        return response()->json([
            'status' => false,
            'msg' => 'error in index',
        ]);
     }
    
    }
    public function show_All()
    {
       
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
       
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try{
            $gaz_Log = gaz_Logs::find($request -> checkBatchId);  // search in given table id only
            if (!$gaz_Log)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
            $gaz_Log =gaz_Logs::with(['directorate','agent','rigon','station'=>function($q){
                $q->select();
            }])->find($request -> checkBatchId);
         

            return response()->json([
                'status' => true,
                'gaz_Log' => $gaz_Log,
               
            ]); 
          }
          catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      try{
              $gaz_Log = gaz_Logs::find($request -> gazLogId);  // search in given table id only
              if (!$gaz_Log)
                  return response()->json([
                      'status' => false,
                      'msg' => 'هذ العرض غير موجود',
                      'id'=>$request -> gazLogId,
                  ]);
              $gaz_Log->validOfSell='0';
              $gaz_Log->update();


              $observer = Observer::find($request->observerId);
              
              $observer->allowBookig='1';
              $observer->numberBatch=$request->gazLogId;
              $observer->qtyOfSell=$gaz_Log->qty;
              $observer->update();
              return response()->json([
                  'status' => true,
                  'gaz_Log' => $gaz_Log,
                  'id'=>$request -> gazLogId,
              ]); 
            }
            catch (\Exception $ex) {
              return response()->json([
                  'status' => false,
                  'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
              ]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
    }
}
