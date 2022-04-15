<?php
namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\Observer;
use Illuminate\Http\Request;

class CitizenController extends Controller
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
        $data = [];
        $data['observers']=Observer::with(['directorate','rigon'=>function($q){
            $q->select();
        }])->find($request->id);
        $data['citizens']=Citizen::select()->get();
        return view('dashboard.observer.citizens.index',$data);
       
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
        try
        {
           $citizens =Citizen::with([
          'directorate'=>function($q)
          {
            $q->select('id','directorate_name');
          }
          ,'rigon'=>function($q)
          {
            $q->select('id','rigon_name');
          }
          ,'observer'=>function($q)
          {
            $q->with(['agent'=>function($q){
                $q->select('id','Agent_name');
            }])->select('id','agent_id')->get();
          }
        ],)->select('id','citizen_name','directorate_id','rigons_id','observer_id')->get();
           return response()->json([
            'status' => true,
            'citizens' => $citizens,
           ]);
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
       
            try { 
                    $file =$request->attachment;
                    $filename = uploadImage('citizens', $file);
                    $citizen = Citizen::create($request->except('_token'));
                    $citizen->attachment=$filename;
                    $citizen->save();
                    if ($citizen)
                        return response()->json([
                            'status' => true,
                            'msg' => 'تم الحفظ بنجاح',
                        ]);
         }
        catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                'data'=>$request->observer_id,
                
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function show(Citizen $citizen)
    {
        //
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
            $citizen = Citizen::find($request -> citizen_Id);  // search in given table id only
            if (!$citizen)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
            $citizen =Citizen::with(['directorate','rigon','observer'=>function($q){
                $q->select();
            }])->find($request -> citizen_Id);
      

            return response()->json([
                'status' => true,
                'citizen' => $citizen,
                
               
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $citizen = Citizen::find($request -> id);
            if (!$citizen)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);
            if ($request->has('attachment')) {
                $fileName = uploadImage('citizens', $request->attachment);
                Citizen::where('id', $request -> id)
                    ->update([
                        'attachment' => $fileName,
                    ]);
            }
            //update data  
            $citizen->update($request->except('_token', 'attachment'));
            return response()->json([
                'status' => true,
                'msg' => 'تم  التحديث بنجاح',
                'attachment'=>$fileName,
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
        try {
            $citizen = Citizen::find($request -> citizen_Id); 
            if (!$citizen)
            return response()->json([
                'status' => false,
                'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
               ]);
             $citizen->delete();
             return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request -> citizen_Id
        ]);
         } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
          
         }
    }
}
