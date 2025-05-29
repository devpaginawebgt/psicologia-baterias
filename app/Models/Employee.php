<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'phone_number',
        'birthday',
        'genre',
        'birthplace',
        'academic_level',
        'marital_status',
        'children',
        'people_depending',
        'uses_transportation',
        'hiring_date',
        'shift',
        'branch_number',
        'branch_address',
        'position',
    ];
}
