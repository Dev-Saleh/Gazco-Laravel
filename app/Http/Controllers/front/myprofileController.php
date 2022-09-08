<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class myProfileController extends Controller
{
    public function index(Request $request)
    {
        try
            {
               $data['myProfileCitz']=Citizen::select('id','citName','mobileNum','identityNum','attachment','citPassword')->where('id', session()->get('idCitizen'))->get(); //->where('obsId',$request->obsId) ذا الشرط لازم نتناقش عليه

                return view('front.myProfile.index',$data);
            }
       catch (\Exception $ex)
           {
                return response()->json(
                [
                    'status'         => false,
                    'msg'            => 'Error In Function Index',
                    'exceptionError' => $ex,
                ]);
           }   
    }
    public function update(Request $request)
    {
        try
        {
            $cit = Citizen::where('id',session()->get('idCitizen'))->update([
                'mobileNum' => $request->mobileNum,
                'identityNum' =>$request->identityNum,
                'citPassword' =>$request->citPassword,

            ])->get();
            if (!$cit)
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);
        
           return response()->json([
                'status' => true,
                'msg' => 'تم  التحديث بنجاح',
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
   
}
