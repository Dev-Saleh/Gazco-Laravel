<?php

namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestsStation;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
   
  
    public function store(RequestsStation $request)
    {
        try 
        { 

                $station = Station::create($request->except('_token'));
                $station->save();

                if ($station)
                return response()->json([
                    'status' => true,
                    'msg' => 'تم الحفظ بنجاح',
                ]);

        }
        catch (\Exception $ex) 
        {

            return response()->json([
                'status'        => false,
                'msg'           => 'فشل الحفظ برجاء المحاوله مجددا',
                'getDataForm'   => $request->all(),
              'exceptionError'  => $ex,
              
               
            ]);
        }
    }

  
    public function show()
    {
        try
        {
            $stations = Station::select('id','staName')->orderby('id','DESC')->get(); // this command work select to all Station 

            if($stations) //this condation if data found return status true and return data
            return response()->json([
                'status' => true,
                'stations' => $stations,
            ]);

       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status'        => false,
               'msg'           => 'error in index',
               'exceptionError'=> $ex,
           ]);
       }
    }
    
    public function edit(Request $request)
    {
        try{

                $sta = Station::select('id','staName')->find($request ->staId);  // search in given table id only
                
                // if Station Not Found return status error
                if (!$sta)
                    return response()->json([
                        'status' => false,
                        'msg' => 'هذ العرض غير موجود',
                    
                    ]);

                // else Station Found return status true and send data by ajax
                return response()->json([
                    'status' => true,
                    'sta' => $sta,
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

    
    public function update(RequestsStation $request)
    {
        try{

            $sta = Station::find($request -> id); // this line search Station by StaId

            if (!$sta)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);

           //update Station data 
            $sta->update($request->except('_token'));

            
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
                'getDataForm'   => $request->all(),
                'exceptionError' =>$ex,
                
            ]);
        }
        
    }

   
    public function destroy(Request $request)
    {
        try
         {

                $sta = Station::find($request -> staId); 

                if (!$sta)
                return response()->json([
                    'status' => false,
                    'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
                ]);

                $sta->delete();

                return response()->json([
                    'status' => true,
                    'msg' => 'تم الحذف بنجاح',
                    'id' => $request -> staId
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

}
