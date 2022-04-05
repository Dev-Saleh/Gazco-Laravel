<?php


namespace App\Http\Controllers\dashborad\admin;

use App\Http\Controllers\Controller;

use App\Models\Locks;
use Illuminate\Http\Request;

class LocksController extends Controller
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
     * @param  \App\locks  $locks
     * @return \Illuminate\Http\Response
     */
    public function show(locks $locks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\locks  $locks
     * @return \Illuminate\Http\Response
     */
    public function edit(locks $locks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\locks  $locks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, locks $locks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\locks  $locks
     * @return \Illuminate\Http\Response
     */
    public function destroy(locks $locks)
    {
        //
    }
}
