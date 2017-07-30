<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

// Every route requires the user to be authenticated
Route::middleware(['auth'])->group(function () {
   Route::get('/', 'DashboardController@index')->name('dashboard.index');

   Route::resource('vehicles', 'VehicleController', ['only' => [
       'index', 'show'
   ]]);

   Route::resource('transmissions', 'VehicleTransmissionController', ['only' => [
       'index', 'show'
   ]]);

   Route::resource('colours', 'VehicleColourController', ['only' => [
       'index', 'show'
   ]]);

   Route::resource('fuel-types', 'FuelTypeController', ['only' => [
       'index', 'show'
   ]]);

   Route::resource('types', 'VehicleTypeController', ['only' => [
       'index', 'show'
   ]]);

   Route::resource('manufacturers', 'VehicleManufacturerController', ['only' => [
       'index', 'show'
   ]]);

   Route::resource('models', 'VehicleModelController', ['only' => [
       'index', 'show'
   ]]);

   Route::resource('owners', 'OwnerController', ['only' => [
       'index', 'show'
   ]]);

   Route::resource('companies', 'CompanyController', ['only' => [
       'index', 'show'
   ]]);
   
});

