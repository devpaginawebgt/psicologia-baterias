<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'country_id' => 1,
            'name' => 'Farmacias Afiliadas',
            'logo' => '/logos/Logo Farmacia Ascavi.png',
            'is_active' => true,
        ]);
    }
}
