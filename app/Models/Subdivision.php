<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    protected $fillable = [
        'division_id',
        'name',
        'is_capital'
    ];

    public function casts()
    {
        return [ 'is_capital' => 'boolean' ];
    }
}
