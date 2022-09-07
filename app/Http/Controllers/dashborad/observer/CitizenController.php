<?php
namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestsCitizen;
use App\Models\Citizen;
use Intervention\Image\Facades\Image;
use App\Models\Observer;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\SelectorNode;

class CitizenController extends Controller
{
   
    public function index(Request $request)
    {
      try
         {
  
            $data['observers']=Observer::with(
            [
                'directorate'=>function($q)
                {
                    $q->select('id','dirName');
                }
                ,'rigon'=>function($q)
                {
                    $q->select('id','rigName');
                }
            ]
            )->select('id','dirId','rigId')->find(session()->get('obsId'));

            $data['citizens']=Citizen::with(
                [
                  'directorate'=>function($q)
                  {
                    $q->select('id','dirName');
                  }
                  ,'rigon'=>function($q)
                  {
                    $q->select('id','rigName');
                  }
                  ,'observer'=>function($q)
                  {
                      $q->with(
                      [
                        'agent'=>function($q)
                        {
                          $q->select('id','agentName');
                        }
                      ]
                      )->select('id','agentId','obsName')->get();
                  }
                ]
                )->select('id','citName','dirId','rigId','obsId','identityNum','checked')->where('obsId',session()->get('obsId'))->get();  // search in given table id only
             
            return view('dashboard.observer.citizens.index',$data);
       
         }
    catch (\Exception $ex)
         {
            return response()->json(
            [
                'status'         => false,
                'msg'            => 'Error In Function Index',
                'exceptionError' => $ex,
                
            ]
            );
         }
    
    }
   
  
    public function store(requestsCitizen $request)
    {
       
           try
               { 
                    $attachment =$request->attachment;  
                    $filename = uploadImageAndResize('citizens', $attachment , $width='220', $height='190');
                  
                    $citizen = Citizen::create($request->except('_token'));
 
                    $citizen->attachment=$filename;
      
                    $citizen->save();
                    
                    $lastCitizenAdd=Citizen::with(
                        [
                          'directorate'=>function($q)
                          {
                            $q->select('id','dirName');
                          }
                          ,'rigon'=>function($q)
                          {
                            $q->select('id','rigName');
                          }
                          ,'observer'=>function($q)
                          {
                              $q->with(
                              [
                                'agent'=>function($q)
                                {
                                  $q->select('id','agentName');
                                }
                              ]
                              )->select('id','agentId','obsName')->get();
                          }
                        ])->select('id','citName','dirId','rigId','obsId')->where('obsId',$request->obsId)->get()->last(); //->where('obsId',$request->obsId) ذا الشرط لازم نتناقش عليه
                   
                        if ($citizen)
                        return response()->json(
                         [
                            'status'         => true,
                            'msg'            => 'تم الحفظ المواطن بنجاح',
                            'alertType'=> '.alertSuccess',
                            'lastCitizenAdd' => $lastCitizenAdd,
                            
                         ]
                        );
                   
               }
           catch (\Exception $ex)
               {
                    $imageDelete=base_path("public/assets/images/citizens/".$filename);
                    if(file_exists($imageDelete))
                    unlink($imageDelete);
                    
                    return response()->json(
                        [
                            'status'         => false,
                            'msg'            => 'Error In Function Save ',
                            'exceptionError' => $ex,
                            'data'           => $request->obsId,  //For Test
                            'lastCitizenAdd' => $lastCitizenAdd,  //For Test
                            
                        ]
                    );
               }
    }

    
   
    public function edit(Request $request)
    {
        try
           {
                $citizen =Citizen::with(
                    [
                      'directorate'=>function($q)
                      {
                        $q->select('id','dirName');
                      }
                      ,'rigon'=>function($q)
                      {
                        $q->select('id','rigName');
                      }
                      ,'observer'=>function($q)
                      {
                          $q->with(
                          [
                            'agent'=>function($q)
                            {
                              $q->select('id','agentName');
                            }
                          ]
                          )->select('id','agentId','obsName')->get();
                      }
                    ]
                  )->select('id','citName','identityNum','citPassword','mobileNum','attachment','dirId','rigId','obsId')->find($request -> citId);
             
                if (!$citizen)
                  return response()->json(
                    [
                       'status'   => false,
                       'msg'      => 'The Citizen Not Found Error In Function Edit',
                       'citId'     => $request->citId,
                    ]
                  );
                
                return response()->json(
                  [
                    'status'  => true,
                    'citizen' => $citizen,  
                 
                  ]
                ); 
            }
          catch (\Exception $ex)
             {
                return response()->json(
                  [
                    'status'         => false,
                    'msg'            => 'Error In Function Edit Citizen',
                    'exceptionError' => $ex,
                    'citId'          => $request->citId,
                  ]
               );
           }
    }

  
    public function update(requestsCitizen $request)
    {
        try
            {
                $citizen = Citizen::find($request -> id);
                if (!$citizen)
                    return response()->json(
                      [
                        'status' => false,
                        'alertType'=> '.alertError',
                        'msg' => 'The Citizen Not Found Error In Function Update ',
                      ]
                  );

                $fileName="";
                //update data  
                $citizen->update($request->except('_token', 'attachment'));

                if($citizen)
                {
                    if ($request->has('attachment')) 
                    {

                        $getBeforeImage=Citizen::select('attachment')->find($request -> id); // Before update attachment Citizen git attchment citizen for detete
                        $fileName=uploadImageAndResize('citizens', $request->attachment , $width='220', $height='190');
                        Citizen::where('id', $request -> id)
                            ->update(
                              [
                                'attachment' => $fileName,
                              ]
                            );   

                            if($getBeforeImage->attachment['exsit'])
                            unlink($getBeforeImage->attachment['public_path']);
                    }
                    $lastCitizenUpdate=Citizen::with(
                      [
                        'directorate'=>function($q)
                        {
                          $q->select('id','dirName');
                        }
                        ,'rigon'=>function($q)
                        {
                          $q->select('id','rigName');
                        }
                        ,'observer'=>function($q)
                        {
                            $q->with(
                            [
                              'agent'=>function($q)
                              {
                                $q->select('id','agentName');
                              }
                            ]
                            )->select('id','agentId','obsName')->get();
                        }
                      ])->select('id','citName','dirId','rigId','obsId')->find($request->id); //->where('obsId',$request->obsId) ذا الشرط لازم نتناقش عليه
                 
                    return response()->json(
                      [
                        'status'            => true,
                        'msg'               => 'تم تعديل بيانات المواطن بنجاح',
                        'alertType'=> '.alertWarning',
                        'attachment'        => $fileName,
                        'lastCitizenUpdate' => $lastCitizenUpdate,
                        'citId'             => $request->id,
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
                    'obsId'           => $request->obsId, //For Test
                    
                  ]
              );
            }
          
    }

    public function destroy(Request $request)
    {
        try 
          {
                $cit = Citizen::find($request -> citId); // Search about Citizen By Citizen Id for defind if Citizen Found Or Not Found This Codition For Delete Citizen

                if (!$cit)
                return response()->json(
                  [
                    'status'  => false,
                    'alertType'=> '.alertError',
                    'msg'     => 'حدث خطأ اثناء حذف المواطن',
                    'citId'   => $request -> citId, //For Test
                  ]
                );

              
                if($cit->attachment['exsit'])
                unlink($cit->attachment['public_path']);
                $cit->delete();

                return response()->json(
                [
                    'status' => true,
                    'alertType'=> '.alertSuccess',
                    'msg'    => 'تم حذف المواطن بنجاح',
                    'citId'  => $request -> citId
                ]
              );
         } 
         catch (\Exception $ex) 
         {
            return response()->json(
             [
                'status'          => false,
                'msg'             => 'Error In Function destroy',
                'citId'           => $request -> citId, //For Test
                'exceptionError'  =>$ex,
             ]
            );
          
         }
    }
}
