<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleTransmission;
use App\Models\Company;
use App\Models\FuelType;
use App\Models\VehicleColour;
use App\Models\Vehicle;
use App\Models\Owner;
use App\Models\VehicleManufacturer;
use App\Models\VehicleModel;
use App\Models\VehicleType;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = [];

        $stats['transmissions'] = ['icon' => 'cogs', 'value' => VehicleTransmission::count(), 'url' => route('transmissions.index')];
        $stats['companies'] = ['icon' => 'building', 'value' => Company::count(), 'url' => route('companies.index')];
        $stats['fuel-types'] = ['icon' => 'battery-full', 'value' => FuelType::count(), 'url' => route('fuel-types.index')];
        $stats['colours'] = ['icon' => 'paint-brush', 'value' => VehicleColour::count(), 'url' => route('colours.index')];
        $stats['vehicles']= ['icon' => 'car', 'value' => Vehicle::count(), 'url' => route('vehicles.index')];
        $stats['manufacturers'] = ['icon' => 'wrench', 'value' => VehicleManufacturer::count(), 'url' => route('manufacturers.index')];
        $stats['models'] = ['icon' => 'taxi', 'value' => VehicleModel::count(), 'url' => route('models.index')];
        $stats['types'] = ['icon' => 'truck', 'value' => VehicleType::count(), 'url' => route('types.index')];
        $stats['owners'] = ['icon' => 'users', 'value' => Owner::count(), 'url' => route('owners.index')];

        return view('dashboard/index')->with(compact('stats'));
    }
}
