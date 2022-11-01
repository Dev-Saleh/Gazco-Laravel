<?php

namespace App\Http\Controllers\dashborad\admin;

use App\Exports\exportBatchReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\gazLogs;
use App\Models\Rigon;
use Mpdf\Config\ConfigVariables;
use Excel;


class batchReportsController extends Controller
{
   
    
    public function index()
    {
        try
        {
            $data['directorates']=Directorate::select('id','dirName')->whereHas('rigon')->whereHas('agent')->orderby('id','DESC')->get();
            return view('dashboard.admin.reports.batchReport',$data);
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
    public function show(Request $request)
    {
        try
        {
            $gazLogs=gazLogs::with(
                [
                   'station'=>function($q)
                   {
                     $q->select('id','staName')->get();
                   }
                   ,'agent'=>function($q)
                   {
                     $q->select('id','agentName')->get();
                   }
                   ,'directorate'=>function($q)
                   {
                     $q->select('id','dirName')->get();
                   }
                   ,'rigon'=>function($q)
                   {
                     $q->select('id','rigName')->get();
                   }
                 ])->select('id','dirId','rigId','staId','agentId','created_at','statusBatch','qty')
                 ->where('agentId',$request->agentId)
                 ->whereBetween('created_at', [$request->dateForm, $request->dateTo])
                 ->get();
                 $batchCount=$gazLogs->count();
                 $batchResult=$gazLogs->sum('qty');
                 $allowBookingCount=$gazLogs->where('statusBatch','3')->count();
                 $notallowBookingCount=$gazLogs->where('statusBatch','1')->count();
                 $dateForm = $request->dateForm;
                 $dateTo   = $request->dateTo;
                 $agentId  = $request->agentId;
                 if($gazLogs)
                 {
                    
                    return response()->json([
                        'status'            => true,
                        'msg'               => 'تم الحفظ بنجاح',
                        'gazLogs'           => $gazLogs,
                        'batchCount'        => $batchCount,
                        'batchResult'       => $batchResult,
                        'allowBookingCount' => $allowBookingCount,
                        'notallowBookingCount' => $notallowBookingCount,
                        'dateForm'          => $dateForm,
                        'dateTo'            => $dateTo,
                        'agentId'           => $agentId,
                    
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
    public function exportExcelBatch(Request $request)
    {
       return Excel::download(new exportBatchReport($request->valueDateForm,$request->valueDateTo,$request->agentId),'salah.xlsx');
    }
}
