<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BatteryEmployee extends Model
{
    protected $table = 'battery_employee';

    protected $fillable = [
        'battery_id',
        'employee_id',
        'points',
        'response_points',
        'submittion_date',
    ];

    public function casts(): array
    {
        return [
            'points'          => 'integer',
            'response_points' => 'integer',
            'submittion_date' => 'datetime',
        ];
    }

    public function battery(): BelongsTo
    {
        return $this->belongsTo(Battery::class, 'battery_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class, 'battery_employee_id');
    }
}
