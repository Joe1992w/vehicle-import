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
     * @param  \App\Models\FuelType  $fuelType
     * @return \Illuminate\Http\Response
     */
    public function show(FuelType $fuel_type)
    {
        //
        $vehicles = Vehicle::whereHas('fuelType', function ($query) use ($fuel_type) {
            $query->where('id', $fuel_type->id);
        })->get();
        return view('fuel-types.show')->with(compact(['fuel_type', 'vehicles']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FuelType  $fuelType
     * @return \Illuminate\Http\Response
     */
    public function edit(FuelType $fuelType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FuelType  $fuelType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FuelType $fuelType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FuelType  $fuelType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FuelType $fuelType)
    {
        //
    }
}
