<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'branch_division_id',
        'branch_subdivision_id',
        'position',
        'sales_productivity',
    ];

    public function casts(): array
    {
        return [
            'birthdate'          => 'date',
            'hiring_date'        => 'date',
            'sales_productivity' => 'decimal:2',
        ];
    }

    public function diseases(): BelongsToMany
    {
        return $this->belongsToMany(Disease::class);
    }

    public function employeeBatteries(): HasMany
    {
        return $this->hasMany(BatteryEmployee::class, 'employee_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function branchDivision(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'branch_division_id');
    }

    public function branchSubdivision(): BelongsTo
    {
        return $this->belongsTo(Subdivision::class, 'branch_subdivision_id');
    }
}
