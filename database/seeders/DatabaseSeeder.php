<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // Configuration
            CountrySeeder::class,
            DivisionSeeder::class,
            DiseaseSeeder::class,

            // Company
            CompanySeeder::class,
            EmployeeSeeder::class,

            // Batteries
            BatterySeeder::class,
            QuestionTypeSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}
