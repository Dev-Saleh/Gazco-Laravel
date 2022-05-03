<?php

namespace App\Http\Controllers\front;


use App\Http\Controllers\Controller;



use App\Models\gazLogs;
use App\Models\logs_Booking;
use App\Models\logsBooking;
use Illuminate\Http\Request;

class checkBookingController extends Controller
{
    
    public function index(Request $request)
    {
        try
            {

                $data['gazLogs']=gazLogs::select()->where('allowBooking',0)->where('qtyRemaining',0)->where('validOfSell',0)->latest('id')->limit('10')->get();
                return view('front.checkBooking.index',$data);
            }
       catch (\Exception $ex)
           {
                return response()->json(
                [
                    'status'         => false,
                    'msg'            => 'Error In Function Index',
                    'exceptionError' => $ex,
                ]);
           }   
    }
 
    public function show(Request $request)
    {
        try
        {
            $logBookings =logsBooking::with(
            [
                'citizen'=>function($q)
                {
                  $q->select('id','citName')->get();
                }
            ]
            )->select()->where('numBatch',$request->numBatch)->get();
           
            if($logBookings)
            return response()->json(
            [
                'status'      => true,
                'logBookings' => $logBookings,
                
            ]);
        }
       catch (\Exception $ex)
        {
           return response()->json(
           [
               'status'           => false,
               'msg'              => 'Error In Function Show',
               'exceptionError'   => $ex,
           ]);
       }
    }

   
}
