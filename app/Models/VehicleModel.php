<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{

    protected $fillable = ['name', 'vehicle_manufacturer_id'];

    //Relationships
    public function manufacturer() {
        return $this->belongsTo(VehicleManufacturer::class, 'vehicle_manufacturer_id');
    }

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }

}
