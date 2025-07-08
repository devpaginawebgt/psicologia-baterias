<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'company_id' => 1,
            'name' => 'Dennis',
            'lastname' => 'Herrera Figueroa',
            'phone_number' => '12345678',
            'birthdate' => Carbon::now()->subYears(30),
            'genre' => 'Masculino',
            'division_id' => null,
            'academic_level' => 'Preparatoria',
            'marital_status' => 'Casado',
            'children' => 0,
            'people_depending' => 0,
            'transportation' => 'Auto',
            'hiring_date' => Carbon::now()->subMonths(8),
            'shift' => null,
            'branch_division_id' => 1,
            'branch_subdivision_id' => 1,
            'position' => 'Dependiente',
            'sales_productivity' => 30,
        ]);
    }
}
