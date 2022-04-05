<?php

namespace App\Http\Controllers;

use App\logs_Table;
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
     * @param  \App\logs_Table  $logs_Table
     * @return \Illuminate\Http\Response
     */
    public function show(logs_Table $logs_Table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\logs_Table  $logs_Table
     * @return \Illuminate\Http\Response
     */
    public function edit(logs_Table $logs_Table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\logs_Table  $logs_Table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, logs_Table $logs_Table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\logs_Table  $logs_Table
     * @return \Illuminate\Http\Response
     */
    public function destroy(logs_Table $logs_Table)
    {
        //
    }
}
