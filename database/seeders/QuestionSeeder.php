<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //? Cuestionario de Estrés percibido
        $stressQuestions = [
            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia te has sentido afectado por algo que ocurrió inesperadamente?',
                'points' => 4,
                'order' => 1,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 0 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 1 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 3 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 4 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia te has sentido incapaz de controlar las cosas importantes en tu vida?',
                'points' => 4,
                'order' => 2,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 0 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 1 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 3 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 4 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia te has sentido nervioso o estresado?',
                'points' => 4,
                'order' => 3,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 0 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 1 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 3 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 4 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has manejado con éxito los pequeños problemas irritantes de la vida?',
                'points' => 4,
                'order' => 4,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 4 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 3 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 1 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 0 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has sentido que has afrontado efectivamente los cambios importantes que han estado ocurriendo en tu vida?',
                'points' => 4,
                'order' => 5,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 4 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 3 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 1 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 0 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has estado seguro sobre tu capacidad para manejar tus problemas personales?',
                'points' => 4,
                'order' => 6,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 4 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 3 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 1 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 0 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has sentido que las cosas van bien?',
                'points' => 4,
                'order' => 7,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 4 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 3 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 1 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 0 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has sentido que no podías afrontar todas las cosas que tenías que hacer?',
                'points' => 4,
                'order' => 8,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 0 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 1 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 3 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 4 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has podido controlar las dificultades de tu vida?',
                'points' => 4,
                'order' => 9,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 4 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 3 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 1 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 0 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has sentido que tenías todo bajo control?',
                'points' => 4,
                'order' => 10,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 4 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 3 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 1 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 0 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has estado enfadado porque las cosas que te han ocurrido estaban fuera de tu control?',
                'points' => 4,
                'order' => 11,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 0 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 1 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 3 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 4 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has pensado sobre las cosas que te faltan por hacer?',
                'points' => 4,
                'order' => 12,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 0 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 1 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 3 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 4 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has podido controlar la forma de pasar el tiempo?',
                'points' => 4,
                'order' => 13,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 4 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 3 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 1 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 0 ],
                ]
            ],

            [
                'battery_id' => 1,
                'question_type_id' => 1,
                'question' => 'En el último mes, ¿con qué frecuencia has sentido que las dificultades se acumulan tanto que no puedes superarlas?',
                'points' => 4,
                'order' => 14,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca', 'points' => 0 ],
                    [ 'option_text' => 'Casi nunca', 'points' => 1 ],
                    [ 'option_text' => 'De vez en cuando', 'points' => 2 ],
                    [ 'option_text' => 'A menudo', 'points' => 3 ],
                    [ 'option_text' => 'Muy a menudo', 'points' => 4 ],
                ]
            ],
        ];

        foreach($stressQuestions as $question) {
            $options = $question['options'];
            unset($question['options']);

            $dbQuestion = Question::create($question);

            foreach($options as $index => $option) {
                $option['question_id'] = $dbQuestion->id;
                $option['order'] = $index + 1;

                QuestionOption::create($option);
            }
        }
    }
}
