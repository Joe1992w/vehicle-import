<?php

namespace App\Http\Controllers;

use App\Models\VehicleColour;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleColourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colours = VehicleColour::orderBy('name')->paginate(10);
        return view('colours.index')->with(compact('colours'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleColour  $vehicleColour
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleColour $colour)
    {
        $vehicles = Vehicle::whereColour($colour)->get();
        return view('colours.show')->with(compact(['colour', 'vehicles']));
    }

}
