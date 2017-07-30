<?php

namespace App\Http\Controllers;

use App\Models\VehicleModel;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $models = VehicleModel::with('vehicles')->orderBy('name')->paginate(10);
        return view('models.index')->with(compact('models'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleModel $model)
    {
        //
        $vehicles = Vehicle::whereModel($model)->get();
        return view('models.show')->with(compact(['model', 'vehicles']));
    }

}
