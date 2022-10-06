<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\logsBooking;
use Illuminate\Http\Request;


class CitizenConfirm extends Controller
{
   
    public function index()
    {
        try
            {
                  
              $data['citizens'] =Citizen::with(
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
                    )->select('id','agentId')->get();
                }
              ]
              )->select('id','citName','identityNum','dirId','rigId','obsId','checked')->where('checked','0')->get();
              return view('dashboard.admin.CitizenConfirm.index',$data); 

          }
       catch (\Exception $ex)
          {
                return response()->json(
                [
                    'status'          => false,
                    'exceptionError'  => $ex,
                ] 
              );
          }
       
    }

    public function show(Request $request)
    {
        try
            {
                $citizen = Citizen::with(
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
                  ])->select('id','attachment','citName','created_at','identityNum','dirId','rigId','obsId','checked')->find($request -> citId);  // search in given table id only
                  $numberOfReceipt=logsBooking::where('statusBooking','1')->where('citId',$citizen->id)->get();
                  if (!$citizen)
                    return response()->json(
                      [
                        'status' => false,                     
                      ]
                   );
                  // هدا الامر بعد جلب معلومات المواطن
                  $bookingNumber =logsBooking::where('citId',$citizen->id)->get(); 

                  return response()->json(
                    [
                      'status'            => true,
                      'citizen'           => $citizen, 
                      'numberOfReceipt'   => $numberOfReceipt->count(),
                      'bookingNumber'    => $bookingNumber->count(),
  
                    ]
                ); 

              }
          catch (\Exception $ex) 
              {
                  return response()->json(
                    [
                      'status'         => false,
                      'msg'            => 'Error in Function Show',
                      'exceptionError' => $ex,
                    ]
                );
              }
    }
    public function update(Request $request)
    {
      
      try 
            {
                  $citizen = Citizen::find($request -> citId); // search The Citizen For Check If Citizen Found OR Not Found

                  if (!$citizen)
                  return response()->json(
                    [
                      'status'    => false,
                      'msg'       => 'The Citizen Not Found Error In Function Update',
                      'citId'     => $request,
                    ]
                  );

                   $citizen->checked= $request->checkbox === 'true' ? '1' : '0'; 
                   $citizen->update();

                  return response()->json(
                    [
                      'status'      => true, 
                      'alertType'=> '.alertSuccess',   
                      'msg'         => 'تم المطابقة بنجاح',
                      'citId'   => $request -> citId, // for Test
                      'checkbox'    => $citizen->checked, // for Test
                      
                    ]
                  );
           } 
        catch (\Exception $ex) 
        {
            return response()->json(
              [
                'status'         => false,
                'msg'            => 'Error In Function Update',
                'exceptionError' => $ex,
              ]
           );
          
        }
  }
    
    public function destroy(Request $request)
    {
        try
           {
                $citizen = Citizen::find($request -> citId);  // Search about Citizen For Delete
               
                if (!$citizen)
                return response()->json(
                  [
                    'status'    => false,
                    'alertType' => '.alertError',
                    'msg'       => 'حدث خطأ أثناء الحذف',
                    'cizId'     => $request -> citId,
                  ]
                );
                
              
                if($citizen->attachment['exsit'])
                unlink($citizen->attachment['public_path']);
                $citizen->delete();

                return response()->json(
                  [
                    'status'    => true, 
                    'alertType' => '.alertSuccess',   
                    'msg'       => 'تم حذف المواطن بنجاح',
                    'citId'     => $request -> citId
                 ]
                );

            } 
          catch (\Exception $ex) 
              {
                  return response()->json(
                    [
                      'status'         => false,
                      'msg'            => 'Error In Function destroy',
                      'exceptionError' => $ex,
                    ]
                  );
                
              }
      }
      public function search(Request $request)
    {
        
        try
        { 
                 if($request->filterCitConfirmSearch=='all')
                    $resultSearch=Citizen::with(
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
                      ])
                      ->select('id','attachment','citName','created_at','identityNum','dirId','rigId','obsId','checked')
                      ->where('citName','Like','%'.$request->textCitConfirmSearch.'%')->where('checked','0')
                      ->orwhere('identityNum','Like','%'.$request->textCitConfirmSearch.'%')->where('checked','0')
                      ->orwhere('id','Like','%'.$request->textCitConfirmSearch.'%')->where('checked','0')
                      ->orwherehas
                        (
                            'directorate',function($q) use($request)
                                {
                                    $q->where('dirName','Like','%'.$request->textCitConfirmSearch.'%')->where('checked','0');
                                }
                        )
                        ->orwherehas
                        (
                            'rigon',function($q) use($request)
                                {
                                    $q->where('rigName','Like','%'.$request->textCitConfirmSearch.'%')->where('checked','0');
                                }
                        )
                        
                        ->get();      
                else if($request->filterCitConfirmSearch=='citName')
                    $resultSearch=Citizen::with(
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
                      ])
                      ->select('id','attachment','citName','created_at','identityNum','dirId','rigId','obsId','checked')
                      ->where('citName','Like','%'.$request->textCitConfirmSearch.'%')->where('checked','0')
                      ->get(); 

                else if($request->filterCitConfirmSearch=='identityNum')
                    $resultSearch=Citizen::with(
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
                      ])
                      ->select('id','attachment','citName','created_at','identityNum','dirId','rigId','obsId','checked')
                      ->where('identityNum','Like','%'.$request->textCitConfirmSearch.'%')->where('checked','0')
                      ->get();      
       
                
            if ($resultSearch)
                return response()->json
                (
                    [
                        'status'        => true,
                        'msg'           => 'تم الحفظ بنجاح', 
                        'resultSearch'  =>  $resultSearch,
                        //'Photo'       => $resultSearch->Photo,
                    ]
                );
 
        }
        catch (\Exception $ex)
         {
            return response()->json([
                'status'             => false,
                'msg'                => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError'     => $ex,
            ]);
         }
    }


}
