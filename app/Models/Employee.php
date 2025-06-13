<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'lastname',
        'phone_number',
        'birthdate',
        'genre',
        'division_id',
        'academic_level',
        'marital_status',
        'children',
        'people_depending',
        'transportation',
        'hiring_date',
        'shift',
        'branch_number',
        'branch_address',
        'position',
        'sales_productivity',
        'emotional_social_session',
        'emotional_management_session',
    ];

    public function diseases(): BelongsToMany
    {
        return $this->belongsToMany(Disease::class);
    }
}
