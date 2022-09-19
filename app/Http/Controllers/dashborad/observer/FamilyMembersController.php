<?php

namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestsfamilyMember;
use App\Models\Citizen;
use App\Models\familyMembers;
use Intervention\Image\Facades\Image;
use App\Models\Observer;
use Illuminate\Http\Request;

class FamilyMembersController extends Controller
{
    public function store(requestsfamilyMember $request)
    {
       
           try
               {  
       
                    $familyMember = familyMembers::create($request->except('_token'));
                    $familyMember->save();

                        if ($familyMember)
                        return response()->json(
                            [
                            'status'         => true,
                            'msg'            => 'تم الحفظ المواطن بنجاح',
                            'alertType'      => '.alertSuccess', 
                            ]
                        );
                   
               }
           catch (\Exception $ex)
               {
                
                    return response()->json(
                        [
                            'status'         => false,
                            'msg'            => 'Error In Function Save ',
                            'exceptionError' => $ex,
                        ]
                    );
               }
    }
    public function show(Request $request)
    {
        try
        {
            $familyMembers =familyMembers::select('id','fmName','sex','relationship')->where('citId',$request->citId)->get();
          
            if($familyMembers)
            return response()->json(
            [
                'status'        => true,
                'familyMembers'  => $familyMembers,
            ]);
        }
       catch (\Exception $ex)
        {
            return response()->json([
                'status'          =>  false,
                'msg'             =>  'error in index',
                'exceptionError'  =>   $ex,
            ]);
        }
    }

    
}
