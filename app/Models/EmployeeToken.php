<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeToken extends Model
{
    protected $fillable = [
        'employee_id',
        'token',
        'expires_at'
    ];
}
