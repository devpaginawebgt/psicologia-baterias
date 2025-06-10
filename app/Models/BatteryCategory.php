<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatteryCategory extends Model
{
    protected $fillable = [
        'battery_id',
        'name',
    ];
}
