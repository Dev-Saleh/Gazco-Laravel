<?php
namespace App\Http\Controllers\dashborad\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rigon as RequestsRigon;
use App\Models\Rigon;
use Illuminate\Http\Request;

class RigonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try { 
            $rigon = Rigon::create($request->except('_token'));
            $rigon->save();
            if ($rigon)
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح',
            ]);
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                'directorates' => $rigon,
            ]);

        }
        catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
           
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rigon  $rigon
     * @return \Illuminate\Http\Response
     */
    public function show(Rigon $rigon)
    {
        try
        {
           $rigons = Rigon::select()->get();
           return response()->json([
            'status' => true,
            'rigons' => $rigons,
           ]);
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
     * @param  \App\Models\Rigon  $rigon
     * @return \Illuminate\Http\Response
     */
    public function edit(Rigon $rigon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rigon  $rigon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rigon $rigon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rigon  $rigon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rigon $rigon)
    {
        //
    }
}
