<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestsRigon;

use App\Models\Rigon;
use Illuminate\Http\Request;

class RigonController extends Controller
{
    
   
    public function store(RequestsRigon $request)
    {
        try 
         { 
                $rig = Rigon::create($request->except('_token'));
                $rig->save();

                if ($rig) 
                return response()->json([

                    'status' => true,
                    'msg' => 'تم الحفظ بنجاح',

                ]);

         }
        catch (\Exception $ex) 
        {

            return response()->json([

                'status'         => false,
                'msg'            => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' => $ex,
           
            ]);
        }
    }

    
    public function show()
    {
        try
        {
            $rigons = Rigon::select('id','rigName','dirId')->orderby('id','DESC')->get();

            if($rigons)
            return response()->json([
                'status' => true,
                'rigons' => $rigons,
            ]);
        }
       catch (\Exception $ex)
        {
            return response()->json([
                'status'         =>  false,
                'msg'            => 'error in index',
                'exceptionError' =>  $ex,
            ]);
       }
    }

    
    public function edit(Request $request)
    {
        try
        {

            $rig = Rigon::with(['directorate'=>function($q)
            {
                $q->select('id','dirName')->get();
            }])->select('id','rigName','dirId')->find($request ->rigId);  // search in given table id only
           
            if (!$rig) 
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                
                ]);
      
            return response()->json([
                'status' => true,
                'rig' => $rig,
            //  'dir'   =>$rigon->directorate,
            ]);
      }
      catch (\Exception $ex) 
      {
            return response()->json([
                'status'         => false,
                'msg'            => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
      }

    }

    public function update(RequestsRigon $request)
    {
        try
        {
            $rig = Rigon::find($request -> id);
            if (!$rig)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);

            //update data
            $rig->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'تم  التحديث بنجاح',
            ]);
        }
        catch (\Exception $ex) 
        {
            return response()->json([
                'status'         => false,
                'msg'            => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' =>$ex,
            ]);
        }
    }


    public function destroy(Request $request)
    {
        try 
        {
            $rig = Rigon::find($request -> rigId); 

            if (!$rig)
            return response()->json([
                'status' => false,
                'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
               ]);
             $rig->delete();
             return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request -> rigId,
              ]);
        } catch (\Exception $ex) 
         {
            return response()->json([
                'status'         => false,
                'msg'            => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' =>$ex,
            ]);
         }
    }

}
