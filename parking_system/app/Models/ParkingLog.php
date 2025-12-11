<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingLog extends Model
{
    protected $fillable = ['vehicle_number','vehicle_type','slot_id','entry_time','exit_time','duration_minutes','fee_paid'];
    public function slot(){ return $this->belongsTo(Slot::class); }

}
