<?php

namespace App\Http\Controllers;

use App\MaintenanceCenter;
use Illuminate\Http\Request;

class MaintenanceCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $centers=MaintenanceCenter::all();
        return view('admin/maintenanceCenter/index',compact('centers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\MaintenanceCenter  $maintenanceCenter
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceCenter $maintenanceCenter)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaintenanceCenter  $maintenanceCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(MaintenanceCenter $maintenanceCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaintenanceCenter  $maintenanceCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenanceCenter $maintenanceCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaintenanceCenter  $maintenanceCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaintenanceCenter $maintenanceCenter)
    {
        //
    }
}
