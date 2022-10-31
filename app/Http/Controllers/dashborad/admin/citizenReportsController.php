<?php

namespace App\Http\Controllers\dashborad\admin;

use App\Exports\exportBatchReport;
use App\Exports\exportCitizenReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Citizen;
use App\Models\Directorate;
use App\Models\gazLogs;
use App\Models\Rigon;
use Mpdf\Config\ConfigVariables;
use Excel;


class citizenReportsController extends Controller
{
   
    
    public function index()
    {
        try
        {
            $data['directorates']=Directorate::select('id','dirName')->whereHas('rigon')->whereHas('agent')->orderby('id','DESC')->get();
            return view('dashboard.admin.reports.citizenReport',$data);
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
    public function showRigons(Request $request)
    {
         try
           {
       
                $rigons = Rigon::select('id','rigName')->where('dirId',$request->dirId)->whereHas('agent')->get();
                $agents = Agent::select('id','agentName')->where('dirId',$request->dirId)->orderby('id','DESC')->get();
                if($rigons)
                return response()->json([
                    'status' => true,
                    'rigons' => $rigons,
                    'agents' => $agents,

                ]);
           }
        catch (\Exception $ex)
            {
                return response()->json([
                    'status'            => false,
                    'msg'               => 'error in function showRigons',
                    'exceptionError'    => $ex,
                ]);
            }
    }
    public function showAgents(Request $request)
    {
        try
          {
        
                $agents = Agent::select('id','agentName')->where('rigId',$request->rigId)->orderby('id','DESC')->get();
                
                if($agents)
                return response()->json([
                    'status' => true,
                    'agents' => $agents,
                ]);
          }
        catch (\Exception $ex)
            {
                return response()->json([
                    'status'           => false,
                    'msg'              => 'error in function showAgents',
                    'exception Error'  =>$ex,
                ]);
            }
    }
    public function show(Request $request)
    {
        try
        {
            $citizens=Citizen::with(
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
                )->select('id','citName','dirId','rigId','obsId','identityNum','mobileNum','checked')
                ->wherehas('observer', function ($q) use ($request) {
                    $q->where('agentId',$request->agentId);
                })
                ->get();
                
                   $citizenCount=$citizens->count();
                   $citCheckedTrue=$citizens->where('checked','نعم')->count();
                   $citCheckedFalse=$citizens->where('checked','لا')->count();
                   $agentId  = $request->agentId;
                 if($citizens)
                 {
                    
                    return response()->json(
                     [
                        'status'            => true,
                        'msg'               => 'تم الحفظ بنجاح',
                        'citizen'           => $citizens,
                        'citCheckedTrue'    => $citCheckedTrue,
                        'citCheckedFalse'   => $citCheckedFalse,
                        'citizenCount'      => $citizenCount,
                         'agentId'          => $agentId,
                    
                    ]);

                 }

            
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
    public function exportExcelCitizen(Request $request)
    {
       return Excel::download(new exportCitizenReport($request->agentId),'salah.xlsx');
    }
}
