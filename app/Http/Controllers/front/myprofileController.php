<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class myProfileController extends Controller
{
    public function index(Request $request)
    {
        try
            {

                return view('front.myProfile.index');
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
}
