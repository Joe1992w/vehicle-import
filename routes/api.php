<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->group(function () {
    Route::resource('vehicles', 'VehicleController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('companies', 'CompanyController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('fuel-types', 'FuelTypeController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('owners', 'OwnerController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('colours', 'VehicleColourController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('manufacturers', 'VehicleManufacturerController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('models', 'VehicleModelController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('transmissions', 'VehicleTransmissionController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('types', 'VehicleTypeController', ['only' => [
        'index', 'show'
    ]]);
});
