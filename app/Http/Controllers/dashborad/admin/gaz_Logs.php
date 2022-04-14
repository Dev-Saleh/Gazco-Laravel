<?php


namespace App\Http\Controllers\dashborad\admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\gaz_Logs as ModelsGaz_Logs;
use App\Models\Rigon;
use App\Models\Station;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class gaz_Logs extends Controller
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
           $data['directorates']=Directorate::whereHas('rigon')->whereHas('agent')->get();
           $data['rigons'] = Rigon::select()->get();
           $data['agents']=Agent::select()->get();
           $data['stations']=Station::select()->get();
           $data['gaz_Logs']=ModelsGaz_Logs::select()->get();
           return view('dashboard.admin.gaz_Logs.index',$data);
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in index',
           ]);
       }

        
    }

    public function show_Rigons(Request $request)
    {
        try
        {
       
           $rigons = Rigon::select()->where('directorate_id',$request->directorate_Id)->whereHas('agent')->get();
           return response()->json([
            'status' => true,
            'rigons' => $rigons,
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
    public function show_Agents(Request $request)
    {
        try
        {
       
           $agents = Agent::select()->where('rigons_id',$request->rigons_Id)->get();
           return response()->json([
            'status' => true,
            'agents' => $agents,
            
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
            $gaz_Log = ModelsGaz_Logs::create($request->except('_token'));
            $gaz_Log->save();
            if ($gaz_Log)
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
     * @param  \App\locks  $locks
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\locks  $locks
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try{
            $gaz_Log = ModelsGaz_Logs::find($request -> gaz_Log_Id);  // search in given table id only
            if (!$gaz_Log)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
            $gaz_Log =ModelsGaz_Logs::with(['directorate','agent','rigon','station'=>function($q){
                $q->select();
            }])->find($request -> gaz_Log_Id);
         

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\locks  $locks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $gaz_Log = ModelsGaz_Logs::find($request -> id);
            if (!$gaz_Log)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);
         
            //update data  
            $gaz_Log->update($request->except('_token'));
            return response()->json([
                'status' => true,
                'msg' => 'تم  التحديث بنجاح',
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
     * @param  \App\locks  $locks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $gaz_Log = ModelsGaz_Logs::find($request -> gaz_Log_Id); 
            if (!$gaz_Log)
            return response()->json([
                'status' => false,
                'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
               ]);
             $gaz_Log->delete();
             return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request -> gaz_Log_Id
        ]);
         } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
          
         }
    }
}
