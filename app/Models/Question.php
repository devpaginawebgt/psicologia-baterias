<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'battery_id',
        'question',
        'question_type_id',
        'points',
        'order',
        'is_active',
    ];

    protected function casts() {
        return [
            'is_active' => 'boolean'
        ];
    }
}
