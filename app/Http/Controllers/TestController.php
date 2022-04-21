<?php

namespace App\Http\Controllers;

use App\logs_Table;
use App\Models\Agent;
use App\Models\Directorate;
use App\Models\Rigon;
use Illuminate\Http\Request;

class LogsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.admin.logs.index');
    }

   
    public function create()
    {   
    //     $agentArray = array("كريم حسن القعر",
    //     "معاذ عبدالله يحيى",
    //     "عبدالناصر اسماعيل علي",
    //     "عبدالرب احمد سالمين",
    //     "ياسر احمد محمود",
    // );

    // $aa = Directorate::all()->random()->id;

    // $ss = Rigon::all()->random()->id;
    // $zz = Rigon::select()->where('directorate_id',$aa)->get();
    // $qq=  $zz->random()->id;
    
    
    //  $mm = Agent::select()->where('directorate_id',$aa)->get();
    //  $mmm=  $mm->random()->id;
    

            // $aa = Directorate::all()->random()->id;
            $aa = Rigon::select()->inRandomOrder()->get("id");
            
            // $zz = Rigon::select()->where('directorate_id', $aa)->get();
            // $mm = Agent::select()->where('directorate_id', $aa)->get();
            // $qq =  $zz->random()->id;
            //  $tt= $mm->random()->id;
            // $aa = Directorate::all()->random()->id;
            // $zz = Rigon::select()->where('directorate_id', $aa)->get();
            // $mm = Agent::select()->where('directorate_id', $aa)->get();
            // $qq =  $zz->random()->id;
            // $tt = $mm->random()->id;
        // echo $mm;
            return  $aa;
        // return  $zz ;
    }
}
  