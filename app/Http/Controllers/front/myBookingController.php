<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class myBookingController extends Controller
{
    
    public function index(Request $request)
    {
        try
            {

                return view('front.myBooking.index');
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
