<?php

namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            return view('dashboard.admin.reports.batchReport');
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
  
}
