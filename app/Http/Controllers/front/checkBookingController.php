<?php

namespace App\Http\Controllers\front;


use App\Http\Controllers\Controller;

use App\Models\Agent;
use App\Models\Citizen;
use App\Models\Directorate;
use App\Models\gaz_Logs;
use App\Models\logs_Booking;
use App\Models\Rigon;
use Illuminate\Http\Request;

class checkBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try
        {
           $data[]='';
           
        //    $data['LogBookings']=logs_Booking::with('citizen',function($q){
        //        $q->select()->get();
        //    })->select()->get();
        $data['gazLogs']=gaz_Logs::select()->where('allowBookig',0)->where('qtyRemaining',0)->latest('id')->limit('10')->get();
  
           return view('front.checkBooking.index',$data);
       }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in index',
           ]);
       }
    }
 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try
        {
            $logBookings =logs_Booking::with(['citizen'=>function($q){
                $q->select('id','citizen_name')->get();
            }])->select()->where('NumBatch',$request->NumBatch)->get();
           
            if($logBookings)
            return response()->json([
                'status' => true,
                'logBookings' => $logBookings,
            ]);
        }
       catch (\Exception $ex)
        {
           return response()->json([
               'status' => false,
               'msg' => 'error in index',
               'error'=>$ex,
           ]);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    }
}
