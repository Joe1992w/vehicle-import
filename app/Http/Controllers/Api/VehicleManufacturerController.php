<?php

namespace App\Http\Controllers\Api;

use App\Models\VehicleManufacturer;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $manufacturers = VehicleManufacturer::with('models.vehicles')->orderBy('name')->paginate(100);
        return compact('manufacturers');
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
        $manufacturer->load('models.vehicles');
        return compact('manufacturer');
    }

}
