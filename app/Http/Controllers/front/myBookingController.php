<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\logsBooking;
use Illuminate\Http\Request;

class myBookingController extends Controller
{
    
    public function index()
    {
        try
            { 

                $data['myBookings']=logsBooking::select('id','numBatch','created_at','statusBooking','citId')->where('citId',session()->get('idCitizen'))->get();
               
                return view('front.myBooking.index',$data);
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
