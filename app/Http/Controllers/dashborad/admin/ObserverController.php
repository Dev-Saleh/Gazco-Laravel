<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\Observer;
use App\Models\Rigon;
use Illuminate\Http\Request;

class ObserverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try
        {
           $data = [];
           $data['directorates']=Directorate::whereHas('rigon')->get();
           $data['rigons'] = Rigon::select()->get();
           $data['agents']=Agent::select()->get();
           $data['observers']=Observer::select()->get();
         
           
           return view('dashboard.admin.observers.index',$data);
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
            $observer = Observer::create($request->except('_token'));
            $observer->save();
            if ($observer)
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح',
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
     * Display the specified resource.
     *
     * @param  \App\Models\Observer  $observer
     * @return \Illuminate\Http\Response
     */
    public function show(Observer $observer)
    {
        //
    }
    public function show_All()
    {
        try
        {
           
            $observers=Observer::with(['directorate','agent','rigon'=>function($q){
                $q->select();
            }])->get();
           
           return response()->json([
            'status' => true,
            'observers' => $observers,
        
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Observer  $observer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try{
            $observer = Observer::find($request -> id);  // search in given table id only
            if (!$observer)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
    
            $observer =Observer::with(['directorate','agent','rigon'=>function($q){
                $q->select();
            }])->find($request -> id);

            return response()->json([
                'status' => true,
                'observer' => $observer,
               
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
     * @param  \App\Models\Observer  $observer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observer $observer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observer  $observer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $observer = Observer::find($request -> id); 
            if (!$observer)
            return response()->json([
                'status' => false,
                'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
               ]);
             $observer->delete();
             return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request -> id
        ]);
         } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
          
         }
    }
    

}
