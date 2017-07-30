<?php

namespace App\Http\Controllers;

use App\Models\VehicleTransmission;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleTransmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transmissions = VehicleTransmission::orderBy('name')->paginate(10);
        return view('transmissions.index')->with(compact('transmissions'));
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
     * @param  \App\Models\VehicleTransmission  $vehicleTransmission
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleTransmission $transmission)
    {
        //
        $vehicles = Vehicle::whereTransmission($transmission)->get();
        return view('transmissions.show')->with(compact(['transmission', 'vehicles']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleTransmission  $vehicleTransmission
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleTransmission $vehicleTransmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleTransmission  $vehicleTransmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleTransmission $vehicleTransmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleTransmission  $vehicleTransmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleTransmission $vehicleTransmission)
    {
        //
    }
}
