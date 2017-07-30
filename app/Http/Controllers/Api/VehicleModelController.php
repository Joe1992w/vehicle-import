<?php

namespace App\Http\Controllers\Api;

use App\Models\VehicleModel;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $models = VehicleModel::with('vehicles', 'manufacturer')->orderBy('name')->paginate(100);
        return compact('models');
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
        $model->load('manufacturer', 'vehicles');
        return compact('model');
    }

}
