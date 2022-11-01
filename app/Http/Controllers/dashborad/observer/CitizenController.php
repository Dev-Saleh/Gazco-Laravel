<?php
namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestsCitizen;
use App\Models\Citizen;
use App\Models\familyMembers;
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
                  )->select('id','citName','dirId','rigId','obsId','identityNum','checked')->where('obsId',session()->get('obsId'))->orderByDesc('id')->get();  // search in given table id only
                $data['allCitizens']=Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')->get();
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
                      $searchfm=familyMembers::where('fmName',$request->citName)->orwhere('identityNum',$request->identityNum)->get();
                    if(!($searchfm && $searchfm->count() > 0))
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
                            ])->select('id','citName','dirId','rigId','obsId','identityNum','checked')->where('obsId',$request->obsId)->get()->last();
                      
                            if ($citizen)
                            {
                              return response()->json(
                              [
                                  'status'         => true,
                                  'msg'            => 'تم الحفظ المواطن بنجاح',
                                  'alertType'      => '.alertSuccess',
                                  'lastCitizenAdd' => $lastCitizenAdd,
                                  
                              ]
                              );
                           }
                    }  
                    
                   else
                    return response()->json(
                      [
                        'status'               => false,
                        'foundAsMember'        => 'أنت مسجل كفرد في الاسره',
                        
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
                  )->select('id','citName','identityNum','citPassword','mobileNum','attachment','checked','dirId','rigId','obsId')->find($request -> citId);
             
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
                      ])->select('id','citName','dirId','rigId','obsId','identityNum','checked')->find($request->id); //->where('obsId',$request->obsId) ذا الشرط لازم نتناقش عليه
                 
                    return response()->json(
                      [
                        'status'            => true,
                        'msg'               => 'تم تعديل بيانات المواطن بنجاح',
                        'alertType'         => '.alertSuccess',
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
            $fmFounding = familyMembers::select('id')->where('citId',$request->citId)->get();
            if($fmFounding->count() > 0)
            {
              return response()->json(
                [
                  'status'  => false,
                  'alertType'=> '.alertWarning',
                  'msg'     => 'لا يمكنك الحذف يوجد افراد مرتبطه بالمواطن',
                  'fmFounding'   => $fmFounding, 
                ]
              );

            }
                $cit = Citizen::find($request -> citId); 

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
    public function search(Request $request)
    {
        try 
        {   

          // if ($request->Regx == true)
          //   {
          //       $resultSearch =Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')
          //       ->where('citName', 'Like', '%' . $request->inputSearch . '%')
          //       ->orwhere('id', 'Like', '%' . $request->inputSearch . '%')
          //       ->orwhere('identityNum', 'Like', '%' . $request->inputSearch . '%')
          //       ->get();
          //   }
           
            
            if ($request->filterSearch == 'all') 
            {
                if(preg_match("/('أ|ا|إ|ى|ي|ئ|و|ؤ|آ')/",$request->inputSearch) && $request->Regx == true)
                {
                    $a=str_replace(array('ا','أ','إ','آ'),'ا',$request->inputSearch);
                    $b=str_replace(array('ا','أ','إ','آ'),'أ',$request->inputSearch);
                    $c=str_replace(array('ا','أ','إ','آ'),'إ',$request->inputSearch);
                    $d=str_replace(array('ا','أ','إ','آ'),'آ',$request->inputSearch);
                    $e=str_replace(array('ئ','ي','ى'),'ي',$request->inputSearch);
                    $f=str_replace(array('ئ','ي','ى'),'ى',$request->inputSearch);
                    $g=str_replace(array('ئ','ي','ى'),'ئ',$request->inputSearch);
                    $h=str_replace(array('ؤ','و'),'و',$request->inputSearch);
                    $i=str_replace(array('ؤ','و'),'ؤ',$request->inputSearch);
                    $resultSearch =Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')
                    ->where('citName','REGEXP',"(".$a."|".$b."|".$c."|".$d."|".$e."|".$f."|".$g."|".$h."|".$i.")") //for test
                    ->orwhere('id', 'Like', '%' . $request->inputSearch . '%')
                    ->orwhere('identityNum', 'Like', '%' . $request->inputSearch . '%')
                    ->get();
                }
                else
                {
                    $resultSearch =Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')
                    ->where('citName', 'Like', '%' . $request->inputSearch . '%')
                    ->orwhere('id', 'Like', '%' . $request->inputSearch . '%')
                    ->orwhere('identityNum', 'Like', '%' . $request->inputSearch . '%')
                    ->get();
                }
            }
            else if($request->filterSearch=='citName')
            {
              if($request->Regx == true){
                 if(preg_match("/('أ|ا|إ|ى|ي|ئ|و|ؤ|آ')/",$request->inputSearch) && $request->Regx == true)
                {
                    $a=str_replace(array('ا','أ','إ','آ'),'ا',$request->inputSearch);
                    $b=str_replace(array('ا','أ','إ','آ'),'أ',$request->inputSearch);
                    $c=str_replace(array('ا','أ','إ','آ'),'إ',$request->inputSearch);
                    $d=str_replace(array('ا','أ','إ','آ'),'آ',$request->inputSearch);
                    $e=str_replace(array('ئ','ي','ى'),'ي',$request->inputSearch);
                    $f=str_replace(array('ئ','ي','ى'),'ى',$request->inputSearch);
                    $g=str_replace(array('ئ','ي','ى'),'ئ',$request->inputSearch);
                    $h=str_replace(array('ؤ','و'),'و',$request->inputSearch);
                    $i=str_replace(array('ؤ','و'),'ؤ',$request->inputSearch);
                    $resultSearch=Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')
                     ->where('citName','REGEXP',"(".$a."|".$b."|".$c."|".$d."|".$e."|".$f."|".$g."|".$h."|".$i.")") //for test
                     ->get();
                 }
                 else
                     {
                         $resultSearch=Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')
                         ->where('citName', 'Like', '%' . $request->inputSearch . '%')->get();
                     }
                  }

              else
              {

                $resultSearch=Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')
                ->where('citName', 'Like', '%' . $request->inputSearch . '%')->get();
              }
              
            }
           else if($request->filterSearch=='id')
            {
              $resultSearch =Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')
              ->where('id', 'Like', '%' . $request->inputSearch . '%')
              ->get();
            }
           else if($request->filterSearch=='identityNum')
            {
              $resultSearch =Citizen::select('id','citName','dirId','rigId','obsId','identityNum','checked')
              ->where('identityNum', 'Like', '%' . $request->inputSearch . '%')
              ->get();
            }
            if ($resultSearch)
                return response()->json
                (
                    [
                        'status'        => true, 
                        'resultSearch'  =>  $resultSearch->where('obsId',session()->get('obsId')),
                    ]
                );

        
        

      } 
        catch (\Exception $ex)
        {
            return response()->json
            (
              [
                'status' => false,
                'msg' => 'فشل البحث برجاء المحاوله مجددا',
                'exceptionError' => $ex,
             ]
           );
        }
    }
}
