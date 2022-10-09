<?php

namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestsAgent;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\Rigon;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        try {
            $data['directorates'] = Directorate::whereHas('rigon')
                ->select('id', 'dirName')
                ->orderby('id', 'DESC')
                ->get();

            $data['agents'] = Agent::with([
                'directorate' => function ($q) {
                    $q->select('id', 'dirName')->get();
                },
            ])
                ->select('id', 'agentName', 'Photo', 'dirId')
                ->orderByDesc('id')
                ->get();

            return view('dashboard.admin.agents.index', $data);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'exceptionError' => $ex,
            ]);
        }
    }
    public function show_rigons(Request $request)
    {
        try {
            $rigons = Rigon::select('id', 'rigName')
                ->where('dirId', $request->dirId)
                ->get();
            if ($rigons) {
                return response()->json([
                    'status' => true,
                    'rigons' => $rigons,
                ]);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'error in index',
                'exceptionError' => $ex,
            ]);
        }
    }

    public function show_All()
    {
        try {
            $agents = Agent::with([
                'directorate' => function ($q) {
                    $q->select('id', 'dirName')->get();
                },
            ])
                ->select('id', 'agentName', 'Photo', 'dirId')
                ->get();

            if ($agents) {
                return response()->json([
                    'status' => true,
                    'agents' => $agents,
                ]);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'error in index',
                'exceptionError' => $ex,
            ]);
        }
    }

    public function store(RequestsAgent $request)
    {
        try {
            $file = $request->Photo;
            $filename = uploadImage('agents', $file);
            $agent = Agent::create($request->except('_token'));
            $agent->Photo = $filename;
            $agent->save();

            $lastAgent = Agent::with([
                'directorate' => function ($q) {
                    $q->select('id', 'dirName')->get();
                },
            ])
                ->select('id', 'Photo', 'agentName', 'dirId')
                ->get()
                ->last();

            if ($agent) {
                return response()->json([
                    'status' => true,
                    'msg' => 'تم حفظ بيانات الوكيل بنجاح',
                    'alertType' => '.alertSuccess',
                    'lastAgent' => $lastAgent,
                    'Photo' => $lastAgent->Photo,
                ]);
            }
        } catch (\Exception $ex) {
            $imageDelete = base_path('public/assets/images/agents/' . $filename);
            if (file_exists($imageDelete)) {
                unlink($imageDelete);
            }

            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ الوكيل يرجاء المحاوله مجددا',
                'alertType' => '.alertError',
                'exceptionError' => $ex,
            ]);
        }
    }
    public function search(Request $request)
    {
        try {
            if ($request->filterSearch == 'all') {
                $resultSearch = Agent::with([
                    'directorate' => function ($q) {
                        $q->select('id', 'dirName')->get();
                    },
                ])
                    ->select('id', 'Photo', 'agentName', 'dirId')
                    ->where('agentName', 'Like', '%' . $request->inputSearch . '%')
                    ->orwhere('id', 'Like', '%' . $request->inputSearch . '%')
                    ->orwherehas('directorate', function ($q) use ($request) {
                        $q->where('dirName', 'Like', '%' . $request->inputSearch . '%');
                    })
                    ->orwherehas('rigon', function ($q) use ($request) {
                        $q->where('rigName', 'Like', '%' . $request->inputSearch . '%');
                    })
                    ->get();
            }
                   else if($request->filterSearch=='agentName')
                   {
                        if(preg_match("/('أ|ا|إ|ى|ي|ئ|و|ؤ|آ')/",$request->inputSearch))
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
                            $resultSearch=Agent::with
                        (
                            [
                                'directorate'=>function($q)
                                {
                                    $q->select('id','dirName')->get();
                                }
                                ]
                            )
                            ->select('id','Photo','agentName','dirId')
                            //->where('agentName','Like','%'.$request->inputSearch.'%')
                        //->where('agentName','REGEXP',".*".$request->inputSearch) //for test
                         ->where('agentName','REGEXP',"(".$a."|".$b."|".$c."|".$d."|".$e."|".$f."|".$g."|".$h."|".$i.")") //for test
                        // ->where('agentName','REGEXP',"(.*".$request->inputSearch.".*)") //for test
                    
                        //->where('agentName','REGEXP',"[أاء]") //for test
                        
                        ->get();
                        }
                  }
                    else if( $request->filterSearch=='dirId' )
                    {
                        $resultSearch=Agent::with
                        (
                            [
                                'directorate'=>function($q)
                                    {
                                      $q->select('id','dirName')->get();
                                    }
                            ]
                        )
                         ->select('id','Photo','agentName','dirId')
                         ->wherehas
                             (
                                'directorate',function($q) use($request)
                                    {
                                        $q->where('dirName','Like','%'.$request->inputSearch.'%');
                                    }
                              )
                        ->get();  
                    }                           
                 
                    else if( $request->filterSearch=='rigId' )
                    $resultSearch=Agent::with
                    (
                        [
                            'directorate'=>function($q)
                                {
                                    $q->select('id','dirName')->get();
                                }
                        ]
                    )
                    ->select('id','Photo','agentName','dirId')
                    ->wherehas
                    (
                        'rigon',function($q) use($request)
                          {
                             $q->where('rigName','Like','%'.$request->inputSearch.'%');
                          }
                    )
                    ->get(); 
                   
                    else if( $request->filterSearch=='id' )
                      $resultSearch=Agent::with
                      (
                          [
                              'directorate'=>function($q)
                             {
                                $q->select('id','dirName')->get();
                             }
                         ]
                       )
                       ->select('id','Photo','agentName','dirId')
                       ->where('id','Like','%'.$request->inputSearch.'%')
                       ->get();   
    

            if ($resultSearch)
                return response()->json
                (
                    [
                        'status'        => true,
                        'msg'           => 'تم الحفظ بنجاح', 
                        'resultSearch'  =>  $resultSearch,
                        're'            => str_replace(array('ا','أ'),'ا',$request->inputSearch), //for Test
                        
                    
                    ]
                );
 
        }
        catch (\Exception $ex)
         {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
        }
    }

    public function edit(Request $request)
    {
        try {
            $agent = Agent::with([
                'directorate' => function ($q) {
                    $q->select('id', 'dirName')->get();
                },
                'rigon' => function ($q) {
                    $q->select('id', 'rigName')->get();
                },
            ])
                ->select('id', 'agentName', 'Photo', 'dirId', 'rigId')
                ->find($request->agentId);

            if (!$agent) {
                return response()->json([
                    'status' => false,
                    'alertType' => '.alertError',
                    'msg' => 'فشل الحذف',
                ]);
            }

            return response()->json([
                'status' => true,
                'alertType' => '.alertWarning',
                'msg' => 'تم التعديل على الوكيل بنجاح',
                'agent' => $agent,
                'photo' => $agent->Photo,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
        }
    }

    public function update(RequestsAgent $request)
    {
        try {
            $agent = Agent::find($request->id);
            if (!$agent) {
                return response()->json([
                    'status' => false,
                    'msg' => 'هذ العرض غير موجود',
                ]);
            }

            //update data
            $agent->update($request->except('_token', 'Photo'));

            $fileName = '';
            if ($request->has('Photo')) {
                $getBeforeImage = Agent::find($request->id); // Before update attachment Citizen git attchment citizen for detete

                $fileName = uploadImage('agents', $request->Photo);
                Agent::where('id', $request->id)->update([
                    'Photo' => $fileName,
                ]);

                if ($getBeforeImage->Photo['exsit']) {
                    unlink($getBeforeImage->Photo['public_path']);
                }
            }
            $lastAgent = Agent::with([
                'directorate' => function ($q) {
                    $q->select('id', 'dirName')->get();
                },
            ])
                ->select('id', 'Photo', 'agentName', 'dirId')
                ->find($request->id);
            return response()->json([
                'status' => true,
                'alertType' => '.alertWarning',
                'msg' => 'تم التعديل على الوكيل بنجاح',
                'photo' => $fileName,
                'lastAgent' => $lastAgent,
                'Photo' => $lastAgent->Photo,
                'agentId' => $request->id,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
        }
    }

    public function destroy(Request $request)
    {
        //Test for push to git hup
        try {
            $agent = Agent::find($request->agentId);
            if (!$agent) {
                return response()->json([
                    'status' => false,
                    'msg' => 'فشل بالتعديل برجاء المحاوله مجددا',
                ]);
            }

            if ($agent->Photo['exsit']) {
                unlink($agent->Photo['public_path']);
            }
            $agent->delete();

            return response()->json([
                'status' => true,
                'msg' => 'تم حذف الوكيل بنجاح',
                'alertType' => '.alertSuccess',
                'agentId' => $request->agentId,
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                'exceptionError' => $ex,
            ]);
        }
    }
}
