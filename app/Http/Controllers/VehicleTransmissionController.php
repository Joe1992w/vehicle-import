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

}
