<?php

namespace App\Http\Controllers\Api;

use App\Models\VehicleColour;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $colours = VehicleColour::with('vehicles')->orderBy('name')->paginate(100);
        return compact('colours');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleColour  $vehicleColour
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleColour $colour)
    {
        $colour->load('vehicles');
        return compact('colour');
    }

}
