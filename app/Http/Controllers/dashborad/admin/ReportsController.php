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
  
}
