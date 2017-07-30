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
     * @param  \App\Models\VehicleColour  $vehicleColour
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleColour $colour)
    {
        $vehicles = Vehicle::whereHas('colour', function ($query) use ($colour) {
            $query->where('id', $colour->id);
        })->get();
        return view('colours.show')->with(compact(['colour', 'vehicles']));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleColour  $vehicleColour
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleColour $vehicleColour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleColour  $vehicleColour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleColour $vehicleColour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleColour  $vehicleColour
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleColour $vehicleColour)
    {
        //
    }
}
