<?php

namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;

use App\Models\Agent;
use App\Models\Directorate;
use App\Models\Rigon;
use Illuminate\Http\Request;

class AgentController extends Controller
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
           $data = [];
           $data['directorates'] =Directorate::whereHas('rigon')->get();
           $data['rigons'] = Rigon::select()->get();
           $data['agents']=Agent::select()->get();
           return view('dashboard.admin.agents.index',$data);
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in index',
           ]);
       }
    }
    public function show_rigons(Request $request)
    {
        try
        {
       
           $rigons = Rigon::select()->where('directorate_id',$request->directorate_id)->get();
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
    
  public function show_All()
    {
        try
        {
           $agents =Agent::with(['directorate'=>function($q){
            $q->select('id','directorate_name');
        }])->get();
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
                   $file =$request->photo;
                   $filename = uploadImage('agents', $file);
                   $agent = Agent::create($request->except('_token'));
                   $agent->photo=$filename;
                   $agent->save();
             if ($agent)
                return response()->json([
                    'status' => true,
                    'msg' => 'تم الحفظ بنجاح', 
                    
                ]);

        }
        catch (\Exception $ex) {
            $imageDelete=base_path("public/assets/images/agents/".$filename);
            if(file_exists($imageDelete))
            unlink($imageDelete);
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',

               
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try{
            $agent = Agent::find($request -> id);  // search in given table id only
            if (!$agent)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
    
            $agent = Agent::select()->find($request ->id);

            return response()->json([
                'status' => true,
                'agent' => $agent,
                'directorate_name'=>$agent->directorate->directorate_name,
                'rigon_name' =>$agent->rigon->rigon_name,
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
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $agent = Agent::find($request -> id);
            if (!$agent)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);
            if ($request->has('photo')) {
                $fileName = uploadImage('agents', $request->photo);
                Agent::where('id', $request -> id)
                    ->update([
                        'photo' => $fileName,
                    ]);
            }
            //update data  
            $agent->update($request->except('_token', 'photo'));
            return response()->json([
                'status' => true,
                'msg' => 'تم  التحديث بنجاح',
                'photo'=>$fileName,
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
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $agent = Agent::find($request -> id); 
            if (!$agent)
            return response()->json([
                'status' => false,
                'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
               ]);
 
             
        
               unlink($agent->photo->public_path);
               $agent->delete();
             return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request -> id,
                
        ]);
         } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
          
         }
    }
}
