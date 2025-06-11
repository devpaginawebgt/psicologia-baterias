<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'is_capital',
    ];

    public function casts() {
        return [
            'is_capital' => 'boolean',
        ];
    }
}
