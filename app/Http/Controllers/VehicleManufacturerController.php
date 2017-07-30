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

}
