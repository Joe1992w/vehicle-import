<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class FuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = FuelType::orderBy('name')->paginate(10);
        return view('fuel-types.index')->with(compact('types'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FuelType  $fuelType
     * @return \Illuminate\Http\Response
     */
    public function show(FuelType $fuel_type)
    {
        //
        $vehicles = Vehicle::whereFuelType($fuel_type)->get();
        return view('fuel-types.show')->with(compact(['fuel_type', 'vehicles']));
    }

}
