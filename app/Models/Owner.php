<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['name', 'company_id', 'profession'];

    //Relationships
    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
}
