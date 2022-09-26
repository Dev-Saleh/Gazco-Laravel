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
           $data['directorates'] = Directorate::select('id','dirName')->orderBy('id', 'DESC')->get();
           $data['rigons'] = Rigon::select('id','rigName')->orderBy('id', 'DESC')->get();
           $data['Stations'] = Station::select('id','staName')->orderBy('id', 'DESC')->get();        //paginate(PAGINATION_COUNT);           ;
           
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
        try 
            { 
                    $dir = Directorate::create($request->except('_token'));
                    $dir->save();
                    $lastDirectorate = Directorate::get()->last();
                    if ($dir)
                    {
                      
                        return response()->json(
                        [
                            'status'           => true,
                            'msg'              => 'تم حفظ بيانات المديريه بنجاح', 
                            'alertType'        => '.alertSuccess', 
                            'lastDirectorate'  => $lastDirectorate,
                        ]);
                   }
            }
        catch (\Exception $ex) 
            {
                return response()->json(
                [
                    'status'           => false,
                    'alertType'        => '.alertError', 
                    'msgError'         => 'فشل الحفظ برجاء المحاوله مجددا',
                    'getDataForm'      => $request->all(), // for Test
                    'exceptionError'   =>$ex,
                ]);
            }
    }

  
    public function show()
    {
        try
        {
           $directorates = Directorate::select('id','dirName')->orderBy('id', 'DESC')->get(); // this command work select to all Directorate 
           if($directorates)  //this condation if data found return status true and return data
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
                $dir = directorate::select('id','dirName')->find($request ->dirId);  // search in given table id only
               
                 // if directorate Not Found return status error
                if (!$dir)
                    return response()->json([
                        'status' => false,
                        'msgError' => 'هذ العرض غير موجود',
                    ]);

               // else directorate Found return status true and send data by ajax
                return response()->json([
                    'status' => true,
                    'directorate' => $dir,
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
        try
        {
                $dir = Directorate::find($request -> id); // this line search Directorate by dirId
                if (!$dir) // if directorate Not found
                    return response()->json([
                        'status' => false,
                        'msgError' => 'هذ العرض غير موجود',
                    ]);
                //update directorate data 
                $dir->update($request->all());
                return response()->json([
                    'status' => true,
                    'msgSuccess' => 'تم  التحديث بنجاح',
                ]);
        }
        catch (\Exception $ex) {
            return response()->json([
                'status'         => false,
                'msg'            => 'فشل الحفظ برجاء المحاوله مجددا',
                'getDataForm'    => $request->all(),
                'exceptionError' => $ex,
            ]);
        }
        
    }
    public function destroy(Request $request)
    {
        
        try {
                $dir = Directorate::find($request -> dirId); 
                if (!$dir)
                return response()->json([
                    'status' => false,
                    'msgError' => 'اسم المديرية غير موجود',
                ]);

                $dir->delete(); 

                return response()->json([
                    'status' => true,
                    'msgSuccess' => 'تم الحذف بنجاح',
                    'dirId' => $request -> dirId,
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
