<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Disease::create([
            'name' => 'Ninguna',
            'initial' => 'N'
        ]);

        Disease::create([
            'name' => 'Diabetes',
            'initial' => 'D'
        ]);

        Disease::create([
            'name' => 'Hipertensión',
            'initial' => 'H'
        ]);

        Disease::create([
            'name' => 'Otra',
            'initial' => 'O'
        ]);
    }
}
