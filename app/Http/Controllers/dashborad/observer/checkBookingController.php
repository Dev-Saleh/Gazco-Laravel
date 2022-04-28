<?php
namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use App\Events\statusBooking;
use App\Listeners\changeStatusBooking;
use App\Models\Citizen;
use App\Models\gaz_Logs;
use App\Models\logs_Booking;
use App\Models\Observer;
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
            $data = [];
            $observer=Observer::find(8);
            $data['gaz_Logs']=gaz_Logs::select()->where('allowBookig','1')->where('qtyRemaining','0')->where('agent_id',$observer->agent_id)->get();
            
            return view('dashboard.observer.check_booking.index',$data);
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
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try
            {
              
                    $showLogBookingsCitizen=logs_Booking::with([
                    'citizen'=>function($q)
                     {
                       $q->select('id','citizen_name','mobile_num');
                     }])->select()->where('NumBatch',$request->gazLogId)->get();
               
              if($showLogBookingsCitizen)
                {
                    return response()->json([
                        'status' => true,
                        'msg' => 'success in index',
                        'showLogBookingsCitizen'=>$showLogBookingsCitizen,
                    ]);
                }
                else 
                {   return response()->json([
                    'status' => false,
                    'msg' => 'error in index',
                ]);
              }
  
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {  
        try
        {
            $logBooking=logs_Booking::find($request->logBookingId);
            if( $logBooking )
             {
                 event(new statusBooking( $logBooking));
                 return response()->json([
                    'status' => true,
                    'msg' => 'True in index',
                ]);
             }

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    }
}
