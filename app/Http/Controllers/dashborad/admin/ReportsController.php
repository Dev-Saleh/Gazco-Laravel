<?php

namespace App\Http\Controllers\dashborad\admin;

use App\Exports\exportBatchReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\Rigon;
use Mpdf\Config\ConfigVariables;
use Excel;


class ReportsController extends Controller
{
   
    
    public function index()
    {
        try
        {
            return view('dashboard.admin.reports.index');
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
    public function batchReport()
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
    public function showRigons(Request $request)
    {
         try
           {
       
                $rigons = Rigon::select('id','rigName')->where('dirId',$request->dirId)->whereHas('agent')->get();
                if($rigons)
                return response()->json([
                    'status' => true,
                    'rigons' => $rigons,
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
    public function citizenReport()
    {
        try
        {
            return view('dashboard.admin.reports.citizenReport');
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
    public function exportExcelBatch(Request $request)
    {
        try
        {
           return Excel::download(new exportBatchReport('2022-09-05','2023-05-03'),'salah.xlsx');
        }
        catch (\Exception $ex)
        {
           return response()->json
           (
                [
                    'status'         => false,
                    'exceptionError' => $ex,
                ]
           );
        }
    }
  
}
