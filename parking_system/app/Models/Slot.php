<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = ['name','slot_type','is_occupied'];

    public function vehicles() {return $this->hasMany(vehicle::class);}
    public function logs() {return $this->hasMany(ParkingLog::class);}
}
