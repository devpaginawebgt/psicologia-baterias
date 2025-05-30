<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatteryEmployee extends Model
{
    protected $fillable = [
        'battery_id',
        'employee_id',
        'points',
        'submittion_date',
    ];
}
