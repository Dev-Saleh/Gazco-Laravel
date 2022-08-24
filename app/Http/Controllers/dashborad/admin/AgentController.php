<?php

namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestsAgent;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\Rigon;
use Illuminate\Http\Request;

class AgentController extends Controller
{
   
    
    public function index()
    {
        try
        {
          

            $data['directorates'] =Directorate::whereHas('rigon')->select('id','dirName')->orderby('id','DESC')->get();          

            $data['agents']=Agent::with(
             [
               'directorate'=>function($q)
                {
                    $q->select('id','dirName')->get();
                }
             ]
            )->select('id','agentName','Photo','dirId')->orderByDesc('id')->get();

            return view('dashboard.admin.agents.index',$data);
        }
       catch (\Exception $ex)
        {
           return response()->json(
           [
               'status'         => false,
               'exceptionError' => $ex,
           ]);
        }
    }
    public function show_rigons(Request $request)
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
               'msg'            => 'error in index',
               'exceptionError' => $ex,
           ]);
       }
    }
    
  public function show_All()
    {
        try
        {
            $agents =Agent::with(['directorate'=>function($q){
                $q->select('id','dirName')->get();
            }])->select('id','agentName','Photo','dirId')->get();

            if($agents)
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
                'exceptionError'=>$ex,
            ]);
        }
    }

    public function store(RequestsAgent $request)
    {
        
        try
        { 

                   $file =$request->Photo;
                   $filename = uploadImage('agents', $file);
                   $agent = Agent::create($request->except('_token'));
                   $agent->Photo=$filename;
                   $agent->save();

                   // كود صلوحي بدون نسخ ولصق الحاصل

                   $lastAgent = Agent::with(['directorate'=>function($q){
                       $q->select('id','dirName')->get();
                   }])->select('id','Photo','agentName','dirId')->get()->last();
                
                 
                  
             if ($agent)
                return response()->json([
                    'status' => true,
                    'msg' => 'تم الحفظ بنجاح', 
                    'lastAgent' => $lastAgent,
                    'Photo'=> $lastAgent->Photo,
                ]);

        }
        catch (\Exception $ex)
         {
            $imageDelete=base_path("public/assets/images/agents/".$filename);
            if(file_exists($imageDelete))
            unlink($imageDelete);

            return response()->json([
                'status'             => false,
                'msg'                => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError'     =>$ex,
            ]);
         }
    }

    public function edit(Request $request)
    {
        try
        {

            $agent = Agent::with(
             [
                 
                'directorate'=>function($q)
                    {
                        $q->select('id','dirName')->get();
                    }
                ,'rigon'=>function($q)
                    {
                        $q->select('id','rigName')->get();
                    }
             ]
            )->select('id','agentName','Photo','dirId','rigId')->find($request->agentId);
            
            if (!$agent)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
            
            return response()->json([
                'status' => true,
                'agent' => $agent,
                'photo'=> $agent->Photo,
            
            ]); 
        }
      catch (\Exception $ex) 
        {
            return response()->json([
                'status'          => false,
                'msg'             => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError'  => $ex,
            ]);
        }
    }

   
    public function update(RequestsAgent $request)
    {
        try
        {
            $agent = Agent::find($request -> id);
            if (!$agent)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);

            //update data  
           $agent->update($request->except('_token', 'Photo'));
           
            $fileName="";
            if ($request->has('Photo'))
             {
                $getBeforeImage=Agent::find($request -> id); // Before update attachment Citizen git attchment citizen for detete
         
                $fileName = uploadImage('agents', $request->Photo);
                Agent::where('id', $request -> id)
                    ->update([
                        'Photo' => $fileName,
                    ]);
                 
                    if($getBeforeImage->Photo['exsit'])
                    unlink($getBeforeImage->Photo['public_path']);
             }
             $lastAgent = Agent::with(['directorate'=>function($q){
                $q->select('id','dirName')->get();
            }])->select('id','Photo','agentName','dirId')->find($request -> id);
            return response()->json([
                'status' => true,
                'msg' => 'تم  التحديث بنجاح',
                'photo'=>$fileName,
                'lastAgent' =>$lastAgent,
                'Photo'=> $lastAgent->Photo,
                'agentId'=>$request->id,
                
            ]);
           

            
        }
        catch (\Exception $ex) {
       
            return response()->json([
                'status'          => false,
                'msg'             => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError'  =>$ex,
            ]);
        }
        
    }
   
    public function destroy(Request $request)
    {
        //Test for push to git hup
        try 
        {

                $agent = Agent::find($request -> agentId); 
                if (!$agent)
                return response()->json([
                    'status' => false,
                    'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
                ]);
                
                if($agent->Photo['exsit'])
                unlink($agent->Photo['public_path']);
                $agent->delete();

                return response()->json([
                    'status' => true,
                    'msg' => 'تم الحذف بنجاح',
                    'agentId' => $request -> agentId,      
                 ]);
        } 
        catch (\Exception $ex) 
         {
            return response()->json([
                'status'          => false,
                'msg'             => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError'  => $ex,
            ]);
         }
    }
}
