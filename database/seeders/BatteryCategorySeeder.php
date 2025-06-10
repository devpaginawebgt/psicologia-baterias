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

        
    }
}
