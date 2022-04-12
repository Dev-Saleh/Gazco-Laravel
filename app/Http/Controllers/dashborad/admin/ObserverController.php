<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\Observer;
use App\Models\Rigon;
use Illuminate\Http\Request;

class ObserverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try
        {
           $data = [];
           $data['directorates'] = Directorate::select()->get();
           $data['rigons'] = Rigon::select()->get();
           $data['agents']=Agent::select()->get();
           return view('dashboard.admin.observers.index',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observer  $observer
     * @return \Illuminate\Http\Response
     */
    public function show(Observer $observer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Observer  $observer
     * @return \Illuminate\Http\Response
     */
    public function edit(Observer $observer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observer  $observer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observer $observer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observer  $observer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observer $observer)
    {
        //
    }
}
