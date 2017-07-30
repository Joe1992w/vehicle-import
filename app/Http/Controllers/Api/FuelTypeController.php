<?php

namespace App\Http\Controllers\Api;

use App\Models\FuelType;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $types = FuelType::with('vehicles')->orderBy('name')->paginate(100);
        return compact('types');
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
        $fuel_type->load('vehicles');
        return compact('fuel_type');
    }
}
