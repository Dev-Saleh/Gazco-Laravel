<?php

namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestsEmployees;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\employee;
use App\Models\Rigon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        try
        {
            $data = [];
            $data['employees']=employee::select('id','empUserName','empRole','empPhoto')->orderby('id','DESC')->get();
             return view('dashboard.admin.employees.index',$data);
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in index',
           ]);
       }
    }
   
    
    public function store(requestsEmployees $request)
    {
        
        try
         { 

            $file =$request->empPhoto;
            $filename = uploadImage('employees', $file);
            $emp = employee::create($request->except('_token'));
            $emp->empPhoto=$filename;
            $emp->save();

                if ($emp)
                    return response()->json([
                        'status' => true,
                        'msg' => 'تم الحفظ بنجاح', 
                        
                    ]);

         }
         catch (\Exception $ex) 
        {

            $imageDelete=base_path("public/assets/images/employees/".$filename);
            if(file_exists($imageDelete))
            unlink($imageDelete);

            return response()->json([
                'status'         => false,
                'msg'            => 'فشل الحفظ برجاء المحاوله مجددا',
                'getDataForm'    =>$request->all(),
                'exceptionError' =>$ex,
            ]);
        }
    }

    
    public function show()
    {
    
            try
            {
               
               $emp =employee::find(52);
               $data['emp']=[$emp->empRole,$emp->empPhoto,$emp->id,$emp->empUserName,$emp->empFullName,$emp->empPassword];
               
               if($emp)
               return response()->json([
                'status' => true,
                'emp' =>$data,

               ]);
            }
           catch (\Exception $ex)
            {
               return response()->json([
                   'status'         => false,
                   'msg'            => 'error in index',
                   'exceptionError' =>$ex,

               ]);
           }
    
    }

   
    public function edit(Request $request)
    {
        try
        {
            $emp = employee::select()->find($request -> empId); // search in given table id only
            
            if (!$emp)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                   
                ]);
    
           
            return response()->json([
                'status' => true,
                'emp' => $emp,
                'empPhoto'=>$emp->empPhoto['valsrc'],
                 
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

   
    public function update(requestsEmployees $request)
    {
        try
        {
            $emp = employee::find($request -> id);

            if (!$emp)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);

        
            //update data  
           $emp->update($request->except('_token', 'empPhoto'));
         
                  
            $fileName="";
            if ($request->has('empPhoto')) {
                $getBeforeImage=employee::select()->find($request -> id); // Before update attachment Citizen git attchment citizen for detete
         
                $fileName = uploadImage('employees', $request->empPhoto);
                employee::where('id', $request -> id)
                    ->update([
                        'empPhoto' => $fileName,
                    ]);
                 
                    if($getBeforeImage->empPhoto['exsit'])
                    unlink($getBeforeImage->empPhoto['public_path']);
            }
            return response()->json([
                'status' => true,
                'msg' => 'تم  التحديث بنجاح',
                'empPhoto'=>$fileName,
            ]);
            
        }
        catch (\Exception $ex) {
       
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
        
    }
   
    public function destroy(Request $request)
    {
        try 
        {
            $emp = employee::find($request -> empId); 

            if (!$emp)
            return response()->json([
                'status' => false,
                'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
               ]);
 
             
               if($emp->empPhoto['exsit'])
               unlink($emp->empPhoto['public_path']);
               $emp->delete();
             return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request -> empId,
             
                
        ]);
         } catch (\Exception $ex) {

            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
          
         }
    }
}
