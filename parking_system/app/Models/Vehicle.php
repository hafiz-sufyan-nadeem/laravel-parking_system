<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['vehicle_number','vehicle_type','slot_id','entry_time'];
    public function slot(){ return $this->belongsTo(Slot::class); }

}
