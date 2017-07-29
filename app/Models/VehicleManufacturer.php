<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleManufacturer extends Model
{
    protected $fillable = ['name'];

    //Relationships
    public function models() {
        return $this->hasMany(VehicleModel::class);
    }

    public function vehicles() {
        return $this->hasManyThrough(Vehicle::class, VehicleModel::class);
    }

}
