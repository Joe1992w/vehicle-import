<?php

namespace App\Http\Controllers\Api;

use App\Models\VehicleTransmission;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $transmissions = VehicleTransmission::with('vehicles')->orderBy('name')->paginate(100);
        return compact('transmissions');
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
        $transmission->load('vehicles');
        return compact('transmission');
    }

}
