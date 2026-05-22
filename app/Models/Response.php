<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Response extends Model
{
    /** @use HasFactory<\Database\Factories\ResponseFactory> */
    use HasFactory;

    protected $fillable = [
        'battery_employee_id',
        'battery_category_id',
        'question_id',
        'question_option_id',
        'response_text',
        'points',
    ];

    protected function casts() {
        return [
            'points' => 'integer',
        ];
    }

    public function batteryEmployee(): BelongsTo
    {
        return $this->belongsTo(BatteryEmployee::class, 'battery_employee_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BatteryCategory::class, 'battery_category_id');
    }

    public function question(): HasOne
    {
        return $this->hasOne(Question::class, 'question_id');
    }

    public function questionOption(): HasOne
    {
        return $this->hasOne(QuestionOption::class, 'question_option_id');
    }
}
