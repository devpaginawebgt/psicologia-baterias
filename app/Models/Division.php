<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'is_capital',
    ];

    public function casts() 
    {
        return [
            'is_capital' => 'boolean',
        ];
    }

    public function subdivisions(): HasMany
    {
        return $this->hasMany(Subdivision::class);
    }
}
