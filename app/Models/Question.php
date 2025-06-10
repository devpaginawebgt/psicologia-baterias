<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'battery_id',
        'question_type_id',
        'question',
        'points',
        'order',
        'is_active',
    ];

    protected function casts() {
        return [
            'is_active' => 'boolean'
        ];
    }

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function questionType(): BelongsTo
    {
        return $this->belongsTo(QuestionType::class);
    }
}
