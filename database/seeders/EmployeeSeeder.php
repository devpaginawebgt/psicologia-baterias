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
            'name' => 'Dennis Herrera',
            'phone_number' => '1234567890',
            'birthdate' => Carbon::now()->subYears(30),
            'genre' => 'Masculino',
            'division_id' => 1,
            'academic_level' => 'Preparatoria',
            'marital_status' => 'Casado',
            'children' => 0,
            'people_depending' => 0,
            'transportation' => 'Auto',
            'hiring_date' => Carbon::now()->subMonths(8),
            'shift' => 'Matutino',
            'branch_number' => 2,
            'branch_address' => 'Ciudad de México',
            'position' => 'Dependiente',
            'sales_productivity' => 2500.20,
        ]);
    }
}
