<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    protected $fillable = ['name'];
    
    //Relationships
    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
}
