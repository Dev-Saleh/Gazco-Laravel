<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class CitizenConfirm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
          $data[]='';
         
          $data['citizens'] =Citizen::with([
          'directorate'=>function($q)
          {
            $q->select('id','dirName');
          }
          ,'rigon'=>function($q)
          {
            $q->select('id','rigName');
          }
          ,'observer'=>function($q)
          {
            $q->with(['agent'=>function($q){
                $q->select('id','Agent_name');
            }])->select('id','agent_id')->get();
          }
        ])->select('id','citizen_name','identity_num','directorate_id','rigons_id','observer_id')->get();
         return view('dashboard.admin.CitizenConfirm.index',$data); 

       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in index',
           ]);
       }
       
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
        //
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
            $citizen = Citizen::find($request -> citizenId);  // search in given table id only
            if (!$citizen)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
             $citizen=Citizen::with([
                'directorate'=>function($q)
                {
                  $q->select('id','dirName');
                }
                ,'rigon'=>function($q)
                {
                  $q->select('id','rigName');
                }
                ,'observer'=>function($q)
                {
                  $q->with(['agent'=>function($q){
                      $q->select('id','Agent_name');
                  }])->select('id','agent_id','observer_name')->get();
                }
              ])->select()->find($request -> citizenId);  
            if ($citizen){
            return response()->json([
                'status' => true,
                'citizen' => $citizen,        
            ]); 
          }
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
        try{
            $citizen = Citizen::find($request -> citizenId);  // search in given table id only
            if (!$citizen)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
             $citizen=Citizen::with([
                'directorate'=>function($q)
                {
                  $q->select('id','dirName');
                }
                ,'rigon'=>function($q)
                {
                  $q->select('id','rigName');
                }
                ,'observer'=>function($q)
                {
                  $q->with(['agent'=>function($q){
                      $q->select('id','Agent_name');
                  }])->select('id','agent_id','observer_name')->get();
                }
              ])->select()->find($request -> citizenId);  
            if ($citizen){
            return response()->json([
                'status' => true,
                'citizen' => $citizen,        
            ]); 
          }
          }
          catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
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
          try {
                  $citizen = Citizen::find($request -> citizenId); 
                  if (!$citizen)
                  return response()->json([
                      'status' => false,
                      'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
                    ]);
                   $citizen->checked= $request->checkbox === 'true' ? '1' : '0'; 
                   $citizen->update();
                  return response()->json([
                      'status' => true,
                      'msg' => 'تم المطابقة بنجاح',
                      'id'=>$request -> citizenId, // for Test
                      'checkbox'=>$citizen->checked, // for Test
                      
              ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError'=>$ex,
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
        try {
            $citizen = Citizen::find($request -> citizenId); 
            if (!$citizen)
            return response()->json([
                'status' => false,
                'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
               ]);
            $imageDelete=base_path("public/assets/images/citizens/".$citizen->attachment);
            if(file_exists($imageDelete))
            unlink($imageDelete);
             $citizen->delete();
             return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request -> citizenId
        ]);
         } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
          
         }
    }
}
