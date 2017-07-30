<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = VehicleType::orderBy('name')->paginate(10);
        return view('types.index')->with(compact('types'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $type)
    {
        //
        $vehicles = Vehicle::whereType($type)->get();
        return view('types.show')->with(compact(['type', 'vehicles']));

    }

}
