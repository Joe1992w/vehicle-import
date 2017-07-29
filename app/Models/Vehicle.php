<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'usage', 'license_plate', 'weight_category', 'seats', 'boot', 'trailer',
        'hgv', 'doors', 'sunroof', 'gps', 'wheels', 'engine_capacity', 'vehicle_model_id',
        'vehicle_type_id', 'vehicle_colour_id', 'vehicle_transmission_id', 'fuel_type_id', 'owner_id'];

    //Relationships
    public function fuelType() {
        return $this->belongsTo(FuelType::class);
    }

    public function owner() {
        return $this->belongsTo(Owner::class);
    }

    public function colour() {
        return $this->belongsTo(VehicleColour::class, 'vehicle_colour_id');
    }

    public function model() {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function getManufacturerAttribute() {
        return $this->model->manufacturer;
    }

    public function transmission() {
        return $this->belongsTo(VehicleTransmission::class, 'vehicle_transmission_id');
    }

    public function type() {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }


}
