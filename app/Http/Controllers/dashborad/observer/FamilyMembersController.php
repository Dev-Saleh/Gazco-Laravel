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

                    $attachment =$request->attachmentFm;  
                    $filename = uploadImageAndResize('familymember', $attachment , $width='220', $height='190');

                    $familyMember = familyMembers::create(
                    [
                      'fmName'=>$request->fmName,
                      'identityNum'=>$request->identityNum,
                      'relationship'=>$request->relationship,
                      'attachment'=> $filename,
                      'sex'=>$request->sex,
                      'age'=>$request->age,
                      'citId'=>$request->citId,
                    ]);
           
                    $familyMember->save();

                        if ($familyMember)
                        return response()->json(
                            [
                                'status'         => true,
                                'msg'            => 'تم الحفظ الفرد بنجاح',
                                'alertType'      => '.alertSuccess', 
                                
                            ]
                    );
                   
               }
           catch (\Exception $ex)
               {
                    $imageDelete = base_path('public/assets/images/familymember/' . $filename);
                    if (file_exists($imageDelete))
                    {
                        unlink($imageDelete);
                    }
                
                    return response()->json(
                        [
                            'status'         => false,
                            'msg'            => 'خطأ في حفظ الفرد ',
                            'alertType'      => '.alertError', 
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
    public function destroy(Request $request)
    {
        try 
          {
                $fm = familyMembers::find($request -> fmId); // Search about Citizen By Citizen Id for defind if Citizen Found Or Not Found This Codition For Delete Citizen

                if (!$fm)
                return response()->json(
                  [
                    'status'  => false,
                    'alertType'=> '.alertError',
                    'msg'     => 'حدث خطأ اثناء حذف المواطن',
                  ]
                );
                
                $fm->delete();

                return response()->json(
                [
                    'status' => true,
                    'alertType'=> '.alertSuccess',
                    'msg'    => 'تم حذف الفرد بنجاح',
                    'fmId'  => $request -> fmId
                ]
              );
         } 
         catch (\Exception $ex) 
         {
            return response()->json(
             [
                'status'          => false,
                'msg'             => 'Error In Function destroy',
                'exceptionError'  =>$ex,
             ]
            );
          
         }
    }
    public function edit(Request $request)
    {
        try
           {
                $fm =familyMembers::select()->find($request -> fmId);
             
                if (!$fm)
                  return response()->json(
                    [
                       'status'   => false,
                       'msg'      => 'The fm Not Found Error In Function Edit',
                    ]
                  );
                
                return response()->json(
                  [
                    'status'  => true,
                    'fm' => $fm,  
                  ]
                ); 
            }
          catch (\Exception $ex)
             {
                return response()->json(
                  [
                    'status'         => false,
                    'msg'            => 'Error In Function Edit fm',
                    'exceptionError' => $ex,
                  ]
               );
           }
    }
    public function update(requestsfamilyMember $request)
    {
        try
            {
                $fm = familyMembers::find($request -> id);
                if (!$fm)
                 return response()->json
                   (
                      [
                          'status'     => false,
                          'alertType'  => '.alertError',
                          'msg'        => 'The Citizen Not Found Error In Function Update ',
                      ]
                  );

                $fileName="";
                //update data  
                $fm->update($request->except('_token', 'attachment'));

                if($fm)
                {
                    if ($request->has('attachment')) 
                    {

                        $getBeforeImage=familyMembers::select('attachment')->find($request -> id); // Before update attachment Citizen git attchment citizen for detete
                        $fileName=uploadImageAndResize('familymember', $request->attachmentFm , $width='220', $height='190');
                        familyMembers::where('id', $request -> id)
                            ->update(
                              [
                                'attachment' => $fileName,
                              ]
                            );   

                            if($getBeforeImage->attachment['exsit'])
                            unlink($getBeforeImage->attachment['public_path']);
                    }
                    $lastfmUpdate=familyMembers::select()->find($request->id); //->where('obsId',$request->obsId) ذا الشرط لازم نتناقش عليه
                 
                    return response()->json(
                      [
                        'status'            => true,
                        'msg'               => 'تم تعديل بيانات المواطن بنجاح',
                        'alertType'         => '.alertWarning',
                        'attachment'        => $fileName,
                        'lastfmUpdate'      => $lastfmUpdate,
                        'fmId'              => $request->id,
                      ]
                  );
            }
            }
        catch (\Exception $ex) 
            {
              
                return response()->json(
                  [
                    'status'          => false,
                    'msg'             => 'Error In Function Update',
                    'exceptionerror'  => $ex,       
                  ]
              );
            }
          
    }

    
}
