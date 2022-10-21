<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class whatsappController extends Controller
{
    public function index(Request $request)
    {
        try
            {

                return view('front.whatsapp.index');
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
