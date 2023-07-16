<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Facade\FlareClient\Http\Response;

class apiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Response()->json(Agent::where('id','20')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // "id": 1,
        // "agentName": "كريم حسن القعر",
        // "agentPassword": null,
        // "Photo": "XUbpiLh4Hci9jbcyIE3EHvhicsQ6ThPOsxHM4oHE.png",
        // "dirId": 2,
        // "rigId": 3,
        // "created_at": null,
        // "updated_at": null
        $agent = Agent::create($request->except('_token'));
        $agent->save();
        return response()->json([
            'status' => true,
            'msg' => 'تم حفظ بيانات الوكيل بنجاح',
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return response()->jsons([
        //     'status' => true,
        //     'msg' => 'تم حدف بيانات الوكيل بنجاح',
        // ]);
   
        $agent = Agent::find($id);
         $agent->delete();
        return response()->json([
            'status' => true,
            'msg' => 'تم حفظ بيانات الوكيل بنجاح',
        ]);
        // if($agent)
        // {
        //    // $agent->delete();
        //     return response()->jsons([
        //         'status' => true,
        //         'msg' => 'تم حدف بيانات الوكيل بنجاح',
        //     ]);
        // }
    

    }
}
