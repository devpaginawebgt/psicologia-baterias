<?php

namespace Database\Seeders;

use App\Models\Battery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Battery::create([
            'name' => 'Bateria 1',
            'url' => 'bateria-1',
            'description' => 'Preguntas de apertura.'
        ]);

        Battery::create([
            'name' => 'Bateria 2',
            'url' => 'bateria-2',
            'description' => 'Descripción de cuestionario.'
        ]);

        Battery::create([
            'name' => 'Bateria 3',
            'url' => 'bateria-3',
            'description' => 'Preguntas de información personal.'
        ]);
    }
}
