<?php

namespace Database\Seeders;

use App\Models\BatteryCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatteryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emotionalCategories = [
            [ 'battery_id' => 2, 'name' => 'Atención' ],
            [ 'battery_id' => 2, 'name' => 'Claridad' ],
            [ 'battery_id' => 2, 'name' => 'Reparación' ],
        ];

        foreach($emotionalCategories as $category) {
            BatteryCategory::create($category);
        }

        $happinessCategories = [
            [ 'battery_id' => 3, 'name' => 'Sentido positivo de la vida' ],
            [ 'battery_id' => 3, 'name' => 'Satisfacción con la vida' ],
            [ 'battery_id' => 3, 'name' => 'Realización personal' ],
            [ 'battery_id' => 3, 'name' => 'Alegría de vivir' ],
        ];

        foreach($happinessCategories as $category) {
            BatteryCategory::create($category);
        }

        $socialSkillsCategories = [
            [ 'battery_id' => 4, 'name' => 'Primeras habilidades sociales' ],
            [ 'battery_id' => 4, 'name' => 'Habilidades sociales avanzadas' ],
            [ 'battery_id' => 4, 'name' => 'Habilidades relacionadas con los sentimientos' ],
            [ 'battery_id' => 4, 'name' => 'Habilidades alternativas a la agresión.' ],
            [ 'battery_id' => 4, 'name' => 'Habilidades para hacer frente al estrés.' ],
            [ 'battery_id' => 4, 'name' => 'Habilidades de Planificación' ],
        ];

        foreach($socialSkillsCategories as $category) {
            BatteryCategory::create($category);
        }
    }
}
