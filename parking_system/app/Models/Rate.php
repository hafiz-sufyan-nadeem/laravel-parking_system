<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['slot_type','first_hour_fee','per_hour_fee','minimum_fee'];

}
