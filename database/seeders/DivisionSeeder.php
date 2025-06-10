<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            ['country_id' => 1, 'name' => 'Guatemala',         'is_capital' => true ],
            ['country_id' => 1, 'name' => 'Baja Verapaz',      'is_capital' => false],
            ['country_id' => 1, 'name' => 'Alta Verapaz',      'is_capital' => false],
            ['country_id' => 1, 'name' => 'Chimaltenango',     'is_capital' => false],
            ['country_id' => 1, 'name' => 'Chiquimula',        'is_capital' => false],
            ['country_id' => 1, 'name' => 'Petén',             'is_capital' => false],
            ['country_id' => 1, 'name' => 'El Progreso',       'is_capital' => false],
            ['country_id' => 1, 'name' => 'Quiché',            'is_capital' => false],
            ['country_id' => 1, 'name' => 'Escuintla',         'is_capital' => false],
            ['country_id' => 1, 'name' => 'Huehuetenango',     'is_capital' => false],
            ['country_id' => 1, 'name' => 'Izabal',            'is_capital' => false],
            ['country_id' => 1, 'name' => 'Jalapa',            'is_capital' => false],
            ['country_id' => 1, 'name' => 'Jutiapa',           'is_capital' => false],
            ['country_id' => 1, 'name' => 'Quetzaltenango',    'is_capital' => false],
            ['country_id' => 1, 'name' => 'Retalhuleu',        'is_capital' => false],
            ['country_id' => 1, 'name' => 'Sacatepéquez',      'is_capital' => false],
            ['country_id' => 1, 'name' => 'San Marcos',        'is_capital' => false],
            ['country_id' => 1, 'name' => 'Santa Rosa',        'is_capital' => false],
            ['country_id' => 1, 'name' => 'Sololá',            'is_capital' => false],
            ['country_id' => 1, 'name' => 'Suchitepéquez',     'is_capital' => false],
            ['country_id' => 1, 'name' => 'Totonicapán',       'is_capital' => false],
            ['country_id' => 1, 'name' => 'Zacapa',            'is_capital' => false],
        ];

        foreach ($divisions as $division) {
            Division::create($division);
        }
    }
}
