<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestsDirectorate;
use App\Models\Directorate;

use App\Models\Rigon;
use App\Models\Station;
use Illuminate\Http\Request;

class DirectorateController extends Controller
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
           $data['directorates'] = Directorate::select()->get();
           $data['rigons'] = Rigon::select()->get();
           $data['Stations'] = Station::select()->get();
           return view('dashboard.admin.directoratesandrigon.index',$data);
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

    
    public function store(RequestsDirectorate $request)
    {
        try { 
            $directorate = Directorate::create($request->except('_token'));
            $directorate->save();
            if ($directorate)
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
     * @param  \App\Models\Directorate  $directorate
     * @return \Illuminate\Http\Response
     */
    public function show(Directorate $directorate)
    {
        try
        {
           $directorates = Directorate::select()->get();
           return response()->json([
            'status' => true,
            'directorates' => $directorates,
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
     * @param  \App\Models\Directorate  $directorate
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try{
        $directorate = Directorate::find($request -> id);  // search in given table id only
        if (!$directorate)
            return response()->json([
                'status' => false,
                'msg' => 'هذ العرض غير موجود',
               
            ]);

        $directorate = directorate::select()->find($request ->id);
        return response()->json([
            'status' => true,
            'directorate' => $directorate,
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
     * @param  \App\Models\Directorate  $directorate
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsDirectorate $request)
    {
        try{
            $directorate = Directorate::find($request -> id);
            if (!$directorate)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);
            //update data
            $directorate->update($request->all());
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
     * @param  \App\Models\Directorate  $directorate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $directorate = Directorate::find($request -> id); 
            if (!$directorate)
            return response()->json([
                'status' => false,
                'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
               ]);
             $directorate->delete();
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
