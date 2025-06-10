<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questionTypes = [
            ['name' => 'select'],
            ['name' => 'open'],
            ['name' => 'multiple'],
        ];

        foreach($questionTypes as $questionType) {
            QuestionType::create($questionType);
        }
    }
}
