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

    public function scopeWhereManufacturer($query, VehicleManufacturer $manufacturer) {
        return $query->whereHas('model', function ($query) use ($manufacturer) {
            $query->whereHas('manufacturer', function ($query) use ($manufacturer) {
                $query->where('id', $manufacturer->id);
            });
        });
    }

    public function scopeWhereModel($query, VehicleModel $model) {
        return $query->whereHas('model', function ($query) use ($model) {
            $query->where('id', $model->id);
        });
    }

    public function scopeWhereColour($query, VehicleColour $colour) {
        return $query->whereHas('colour', function ($query) use ($colour) {
            $query->where('id', $colour->id);
        });
    }

    public function scopeWhereTransmission($query, VehicleTransmission $transmission) {
        return $query->whereHas('transmission', function ($query) use ($transmission) {
            $query->where('id', $transmission->id);
        });
    }

    public function scopeWhereType($query, VehicleType $type) {
        return $query->whereHas('type', function ($query) use ($type) {
            $query->where('id', $type->id);
        });
    }

    public function scopeWhereFuelType($query, FuelType $fuelType) {
        return $query->whereHas('fuelType', function ($query) use ($fuelType) {
            $query->where('id', $fuelType->id);
        });
    }

    public function scopeWhereOwner($query, Owner $owner) {
        return $query->whereHas('owner', function ($query) use ($owner) {
            $query->where('id', $owner->id);
        });
    }

}
