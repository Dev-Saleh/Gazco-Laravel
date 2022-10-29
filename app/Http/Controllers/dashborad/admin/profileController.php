<?php

namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestsAgent;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\profile;
use App\Models\Rigon;
use Illuminate\Http\Request;

class profileController extends Controller
{
   
    
    public function index()
    {
        try
        {
            return view('dashboard.admin.profile.index');
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
    public function update(Request $request)
    {
        
        try
        { 

                  /* $file =$request->profilePhoto;
                   $filename = uploadImage('adminProfile', $file);*/
                   $profile = profile::select()->get()->last();
                   if (!$profile) 
                   {
                       return response()->json(
                       [
                           'status' => false,
                           'msg' => 'هذ العرض غير موجود',
                       ]);
                   }
                   //update date
                   $profile->update(
                    [ 
                       'numDaysBookingValid'  =>$request->numDaysBookingValid,
                       'nameMessage'          =>$request->nameMessage,
                       'contentMessage'       =>$request->contentMessage,
                   ]);
                  // $profile->profilePhoto=$filename;
                 
             if ($profile)
                return response()->json(
                 [
                    'status'      => true,
                    'msg'         => 'تم تحديد بيانات بنجاح', 
                    'alertType'   => '.alertSuccess',
                 ]
              );

        }
        catch (\Exception $ex)
         {
           /* $imageDelete=base_path("public/assets/images/adminProfile/".$filename);
            if(file_exists($imageDelete))
            unlink($imageDelete);
            */
            return response()->json(
              [
                    'status'            => false,
                    'msg'               =>'فشل الحفظ الوكيل يرجاء المحاوله مجددا',
                    'alertType'         =>'.alertError',
                    'data'              =>$request->nameMessage,
                    'exceptionError'    =>$ex,
              ]
             );
         }
    }
    
    
}
