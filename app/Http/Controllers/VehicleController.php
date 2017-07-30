<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleManufacturer;
use App\Models\VehicleColour;
use App\Models\VehicleTransmission;
use App\Models\VehicleType;
use App\Models\FuelType;
use App\Models\Owner;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $vehicles = Vehicle::with('model', 'model.manufacturer', 'owner');

        if($request->input('manufacturer')) {
            $manufacturer = VehicleManufacturer::findOrFail($request->input('manufacturer'));
            $vehicles = $vehicles->whereManufacturer($manufacturer);
        }

        if($request->input('model')) {
            $model = VehicleModel::findOrFail($request->input('model'));
            $vehicles = $vehicles->whereModel($model);
        }

        if($request->input('colour')) {
            $colour = VehicleColour::findOrFail($request->input('colour'));
            $vehicles = $vehicles->whereColour($colour);
        }

        if($request->input('transmission')) {
            $transmission = VehicleTransmission::findOrFail($request->input('transmission'));
            $vehicles = $vehicles->whereTransmission($transmission);
        }

        if($request->input('type')) {
            $type = VehicleType::findOrFail($request->input('type'));
            $vehicles = $vehicles->whereType($type);
        }

        if($request->input('fuel')) {
            $fuel = FuelType::findOrFail($request->input('fuel'));
            $vehicles = $vehicles->whereFuelType($fuel);
        }

        if($request->input('owner')) {
            $owner = Owner::findOrFail($request->input('owner'));
            $vehicles = $vehicles->whereOwner($owner);
        }

        $vehicles = $vehicles->paginate(10)
            ->appends($request->only(['manufacturer', 'model', 'colour', 'transmission', 'type', 'fuel', 'owner']));

        $manufacturers = VehicleManufacturer::orderBy('name')->get();
        $models= VehicleModel::orderBy('name')->get();
        $colours = VehicleColour::orderBy('name')->get();
        $transmissions = VehicleTransmission::orderBy('name')->get();
        $types = VehicleType::orderBy('name')->get();
        $fuels = FuelType::orderBy('name')->get();
        $owners = Owner::orderBy('name')->get();

        return view('vehicles.index')->with(compact([
            'vehicles',
            'manufacturers',
            'models',
            'colours',
            'transmissions',
            'types',
            'fuels',
            'owners'
        ]));
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
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
        return view('vehicles.show')->with(compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
