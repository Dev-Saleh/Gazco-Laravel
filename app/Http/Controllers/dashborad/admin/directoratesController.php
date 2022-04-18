<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestsDirectorates;
use App\Models\Directorate;

use App\Models\Rigon;
use App\Models\Station;
use Illuminate\Http\Request;

class directoratesController extends Controller
{
    public function index()
    {
        try
        {
           $data = [];
           $data['directorates'] = Directorate::select()->get();
           $data['rigons'] = Rigon::select()->get();
           $data['Stations'] = Station::select()->get();
           
           return view('dashboard.admin.directoratesRigonsStations.index',$data);
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msgError' => 'error in index',
               'exceptionError'=>$ex,
               
           ]);
       }
        
     
    }

    public function store(requestsDirectorates $request)
    {
        try { 
                $directorate = Directorate::create($request->except('_token'));
                $directorate->save();
                if ($directorate)
                return response()->json([
                    'status' => true,
                    'msgSuccess' => 'تم الحفظ بنجاح',
                ]);
        }
        catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msgError' => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError'=>$ex,
            ]);
        }
    }

  
    public function show()
    {
        try
        {
           $directorates = Directorate::select('id','directorate_name')->get();
           if($directorates)
            {
                return response()->json([
                'status' => true,
                'directorates' => $directorates,
                ]);
           }
           
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


    public function edit(Request $request)
    {
        try{
        $directorate = Directorate::find($request -> directorateId);  // search in given table id only
        if (!$directorate)
            return response()->json([
                'status' => false,
                'msgError' => 'هذ العرض غير موجود',
            ]);

        $directorate = directorate::select('id','directorate_name')->find($request ->directorateId);
        return response()->json([
            'status' => true,
            'directorate' => $directorate,
        ]);
      }
      catch (\Exception $ex) {
        return response()->json([
            'status' => false,
            'msgError' => 'فشل',
            'exceptionError'=>$ex,
        ]);
    }

    }
    public function update(requestsDirectorates $request)
    {
        try{
            $directorate = Directorate::find($request -> id);
            if (!$directorate)
                return response()->json([
                    'status' => false,
                    'msgError' => 'هذ العرض غير موجود',
                ]);
            //update data
            $directorate->update($request->all());
            return response()->json([
                'status' => true,
                'msgSuccess' => 'تم  التحديث بنجاح',
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
        try {
                $directorate = Directorate::find($request -> directorateId); 
                if (!$directorate)
                return response()->json([
                    'status' => false,
                    'msgError' => 'اسم المديرية غير موجود',
                ]);

                $directorate->delete(); 

                return response()->json([
                    'status' => true,
                    'msgSuccess' => 'تم الحذف بنجاح',
                    'directorateId' => $request -> directorateId,
            ]);
         } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msgError' => 'فشل بالحذف برجاء المحاوله مجددا',
                'exceptionError'=>$ex,
            ]);
          
         }
    }
}
