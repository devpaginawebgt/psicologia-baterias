<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Battery extends Model
{
    /** @use HasFactory<\Database\Factories\BatteryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
