<?php

namespace App\Http\Controllers\Api;

use App\Models\VehicleType;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $types = VehicleType::with('vehicles')->orderBy('name')->paginate(10);
        return compact('types');
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
        $type->load('vehicles');
        return compact('type');
    }
}
