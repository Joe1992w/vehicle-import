<?php

namespace App\Http\Controllers;

use App\Models\VehicleManufacturer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manufacturers = VehicleManufacturer::with('models.vehicles')->orderBy('name')->paginate(10);
        return view('manufacturers.index')->with(compact('manufacturers'));
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
     * @param  \App\Models\VehicleManufacturer  $vehicleManufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleManufacturer $manufacturer)
    {
        //
        $vehicles = Vehicle::whereManufacturer($manufacturer)->get();
        return view('manufacturers.show')->with(compact(['manufacturer', 'vehicles']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleManufacturer  $vehicleManufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleManufacturer $vehicleManufacturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleManufacturer  $vehicleManufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleManufacturer $vehicleManufacturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleManufacturer  $vehicleManufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleManufacturer $vehicleManufacturer)
    {
        //
    }
}
