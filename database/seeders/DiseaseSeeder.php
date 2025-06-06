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
        Disease::insert([
            // [ 'name' => 'Ninguna',              'initial' => 'N'  ],
            [ 'name' => 'Diabetes',             'initial' => 'D'  ],
            [ 'name' => 'Hipertensión',         'initial' => 'H'  ],
            [ 'name' => 'Sobrepeso / Obesidad', 'initial' => 'S'  ],
            [ 'name' => 'Otra',                 'initial' => 'O'  ],
        ]);
    }
}
