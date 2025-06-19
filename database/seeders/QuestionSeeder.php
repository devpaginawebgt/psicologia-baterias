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

        $emotionalQuestions = [
            [
                'battery_id' => 2,
                'battery_category_id' => 1,
                'question_type_id' => 1,
                'question' => 'Presto mucha atención a los sentimientos.',
                'points' => 5,
                'order' => 1,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 1,
                'question_type_id' => 1,
                'question' => 'Normalmente me preocupo por lo que siento.',
                'points' => 5,
                'order' => 2,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 1,
                'question_type_id' => 1,
                'question' => 'Normalmente dedico tiempo a pensar en mis emociones.',
                'points' => 5,
                'order' => 3,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 1,
                'question_type_id' => 1,
                'question' => 'Pienso que merece la pena prestar atención a mis emociones.',
                'points' => 5,
                'order' => 4,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 1,
                'question_type_id' => 1,
                'question' => 'Dejo que mis sentimientos afecten a mis pensamientos.',
                'points' => 5,
                'order' => 5,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 1,
                'question_type_id' => 1,
                'question' => 'Pienso en mi estado de ánimo constantemente.',
                'points' => 5,
                'order' => 6,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 1,
                'question_type_id' => 1,
                'question' => 'A menudo pienso en mis sentimientos.',
                'points' => 5,
                'order' => 7,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 1,
                'question_type_id' => 1,
                'question' => 'Presto mucha atención a cómo me siento.',
                'points' => 5,
                'order' => 8,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],

            [
                'battery_id' => 2,
                'battery_category_id' => 2,
                'question_type_id' => 1,
                'question' => 'Tengo claros mis sentimientos.',
                'points' => 5,
                'order' => 9,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 2,
                'question_type_id' => 1,
                'question' => 'Frecuentemente puedo definir mis sentimientos.',
                'points' => 5,
                'order' => 10,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 2,
                'question_type_id' => 1,
                'question' => 'Casi siempre sé cómo me siento.',
                'points' => 5,
                'order' => 11,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 2,
                'question_type_id' => 1,
                'question' => 'Normalmente conozco mis sentimientos sobre las personas.',
                'points' => 5,
                'order' => 12,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 2,
                'question_type_id' => 1,
                'question' => 'A menudo me doy cuenta de mis sentimientos en diferentes situaciones.',
                'points' => 5,
                'order' => 13,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 2,
                'question_type_id' => 1,
                'question' => 'Siempre puedo decir cómo me siento.',
                'points' => 5,
                'order' => 14,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 2,
                'question_type_id' => 1,
                'question' => 'A veces puedo decir cuáles son mis emociones.',
                'points' => 5,
                'order' => 15,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 2,
                'question_type_id' => 1,
                'question' => 'Puedo llegar a comprender mis sentimientos.',
                'points' => 5,
                'order' => 16,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],

            [
                'battery_id' => 2,
                'battery_category_id' => 3,
                'question_type_id' => 1,
                'question' => 'Aunque a veces me siento triste, suelo tener una visión positiva.',
                'points' => 5,
                'order' => 17,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 3,
                'question_type_id' => 1,
                'question' => 'Aunque me sienta mal, procuro pensar en cosas agradables.',
                'points' => 5,
                'order' => 18,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 3,
                'question_type_id' => 1,
                'question' => 'Cuando estoy triste, pienso en todos los placeres de la vida.',
                'points' => 5,
                'order' => 19,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 3,
                'question_type_id' => 1,
                'question' => 'Intento tener pensamientos positivos, aunque me sienta mal.',
                'points' => 5,
                'order' => 20,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 3,
                'question_type_id' => 1,
                'question' => 'Si doy demasiadas vueltas a las cosas, complicándolas, trato de calmarme.',
                'points' => 5,
                'order' => 21,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 3,
                'question_type_id' => 1,
                'question' => 'Me preocupo por tener un buen estado de ánimo.',
                'points' => 5,
                'order' => 22,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 3,
                'question_type_id' => 1,
                'question' => 'Tengo mucha energía cuando me siento feliz.',
                'points' => 5,
                'order' => 23,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 2,
                'battery_category_id' => 3,
                'question_type_id' => 1,
                'question' => 'Cuando estoy enfadado intento cambiar mi estado de ánimo.',
                'points' => 5,
                'order' => 24,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nada de acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Algo de acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Bastante de acuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Muy de acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente de acuerdo', 'points' => 5 ],
                ]
            ],
        ];

        foreach($emotionalQuestions as $question) {
            $options = $question['options'];
            unset($question['options']);

            $dbQuestion = Question::create($question);

            foreach($options as $index => $option) {
                $option['question_id'] = $dbQuestion->id;
                $option['order'] = $index + 1;

                QuestionOption::create($option);
            }
        }

        $happinessQuestions = [
            [
                'battery_id' => 3,
                'battery_category_id' => 5,
                'question_type_id' => 1,
                'question' => 'En la mayoría de las cosas mi vida está cerca de mi ideal',
                'points' => 5,
                'order' => 1,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'Siento que mi vida está vacía',
                'points' => 5,
                'order' => 2,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 5,
                'question_type_id' => 1,
                'question' => 'Las condiciones de mi vida son excelentes',
                'points' => 5,
                'order' => 3,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 5,
                'question_type_id' => 1,
                'question' => 'Estoy satisfecho con mi vida',
                'points' => 5,
                'order' => 4,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 5,
                'question_type_id' => 1,
                'question' => 'La vida ha sido buena conmigo',
                'points' => 5,
                'order' => 5,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 5,
                'question_type_id' => 1,
                'question' => 'Me siento satisfecho con lo que soy',
                'points' => 5,
                'order' => 6,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'Pienso que nunca seré feliz',
                'points' => 5,
                'order' => 7,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 6,
                'question_type_id' => 1,
                'question' => 'Hasta ahora, he conseguido las cosas que para mí son importantes',
                'points' => 5,
                'order' => 8,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 6,
                'question_type_id' => 1,
                'question' => 'Si volviese a nacer, no cambiaría casi nada en mi vida',
                'points' => 5,
                'order' => 9,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 5,
                'question_type_id' => 1,
                'question' => 'Me siento satisfecho porque estoy donde tengo que estar',
                'points' => 5,
                'order' => 10,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'La mayoría del tiempo me siento feliz',
                'points' => 5,
                'order' => 11,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 7,
                'question_type_id' => 1,
                'question' => 'Es maravilloso vivir',
                'points' => 5,
                'order' => 12,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 7,
                'question_type_id' => 1,
                'question' => 'Por lo general me siento bien',
                'points' => 5,
                'order' => 13,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'Me siento inútil',
                'points' => 5,
                'order' => 14,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 7,
                'question_type_id' => 1,
                'question' => 'Soy una persona optimista',
                'points' => 5,
                'order' => 15,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 7,
                'question_type_id' => 1,
                'question' => 'He experimentado la alegría de vivir',
                'points' => 5,
                'order' => 16,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'La vida ha sido injusta conmigo',
                'points' => 5,
                'order' => 17,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'Tengo problemas tan hondos que me quitan la tranquilidad',
                'points' => 5,
                'order' => 18,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'Me siento un fracasado',
                'points' => 5,
                'order' => 19,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'La felicidad es para algunas personas, no para mi',
                'points' => 5,
                'order' => 20,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 6,
                'question_type_id' => 1,
                'question' => 'Estoy satisfecho con lo que hasta ahora he alcanzado',
                'points' => 5,
                'order' => 21,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'Me siento triste por lo que soy',
                'points' => 5,
                'order' => 22,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'Para mí, la vida es una cadena de sufrimientos',
                'points' => 5,
                'order' => 23,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 6,
                'question_type_id' => 1,
                'question' => 'Me considero una persona realizada',
                'points' => 5,
                'order' => 24,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 6,
                'question_type_id' => 1,
                'question' => 'Mi vida transcurre plácidamente',
                'points' => 5,
                'order' => 25,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 4,
                'question_type_id' => 1,
                'question' => 'Todavía no he encontrado sentido a mi existencia',
                'points' => 5,
                'order' => 26,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 1 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 3,
                'battery_category_id' => 6,
                'question_type_id' => 1,
                'question' => 'Creo que no me falta nada',
                'points' => 5,
                'order' => 27,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Totalmente de Acuerdo', 'points' => 5 ],
                    [ 'option_text' => 'Acuerdo', 'points' => 4 ],
                    [ 'option_text' => 'Ni acuerdo ni desacuerdo', 'points' => 3 ],
                    [ 'option_text' => 'Desacuerdo', 'points' => 2 ],
                    [ 'option_text' => 'Totalmente en Desacuerdo', 'points' => 1 ],
                ]
            ],
        ];

        foreach($happinessQuestions as $question) {
            $options = $question['options'];
            unset($question['options']);

            $dbQuestion = Question::create($question);

            foreach($options as $index => $option) {
                $option['question_id'] = $dbQuestion->id;
                $option['order'] = $index + 1;

                QuestionOption::create($option);
            }
        }

        $socialSkillsQuestions = [
            [
                'battery_id' => 4,
                'battery_category_id' => 8,
                'question_type_id' => 1,
                'question' => 'Prestas atención a la persona que te está hablando y haces un esfuerzo para comprender lo que te están diciendo.',
                'points' => 5,
                'order' => 1,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 8,
                'question_type_id' => 1,
                'question' => 'Inicias una conversación con otras personas y luego puedes mantenerla por un momento.',
                'points' => 5,
                'order' => 2,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 8,
                'question_type_id' => 1,
                'question' => 'Hablas con otras personas sobre cosas que interesan a ambos.',
                'points' => 5,
                'order' => 3,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 8,
                'question_type_id' => 1,
                'question' => 'Eliges la información que necesitas saber y se la pides a la persona adecuada.',
                'points' => 5,
                'order' => 4,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 8,
                'question_type_id' => 1,
                'question' => 'Dices a los demás que tú estás agradecida(o) con ellos por algo que hicieron por ti.',
                'points' => 5,
                'order' => 5,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 8,
                'question_type_id' => 1,
                'question' => 'Te esfuerzas por conocer nuevas personas por propia iniciativa.',
                'points' => 5,
                'order' => 6,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 8,
                'question_type_id' => 1,
                'question' => 'Presentas a nuevas personas con otros(as).',
                'points' => 5,
                'order' => 7,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 8,
                'question_type_id' => 1,
                'question' => 'Dices a los demás lo que te gusta de ellos o de lo que hacen.',
                'points' => 5,
                'order' => 8,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 9,
                'question_type_id' => 1,
                'question' => 'Pides ayuda cuando la necesitas.',
                'points' => 5,
                'order' => 9,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 9,
                'question_type_id' => 1,
                'question' => 'Te integras a un grupo para participar en una determinada actividad.',
                'points' => 5,
                'order' => 10,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 9,
                'question_type_id' => 1,
                'question' => 'Explicas con claridad a los demás cómo hacer una tarea específica.',
                'points' => 5,
                'order' => 11,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 9,
                'question_type_id' => 1,
                'question' => 'Prestas atención a las instrucciones, pides explicaciones y llevas adelante las instrucciones correctamente.',
                'points' => 5,
                'order' => 12,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 9,
                'question_type_id' => 1,
                'question' => 'Pides disculpas a los demás cuando has hecho algo que sabes que está mal.',
                'points' => 5,
                'order' => 13,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 9,
                'question_type_id' => 1,
                'question' => 'Intentas persuadir a los demás de que tus ideas son mejores y que serán de mayor utilidad que las de las otras personas.',
                'points' => 5,
                'order' => 14,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 10,
                'question_type_id' => 1,
                'question' => 'Intentas comprender y reconocer las emociones que experimentas.',
                'points' => 5,
                'order' => 15,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 10,
                'question_type_id' => 1,
                'question' => 'Permites que los demás conozcan lo que sientes.',
                'points' => 5,
                'order' => 16,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 10,
                'question_type_id' => 1,
                'question' => 'Intentas comprender lo que sienten los demás.',
                'points' => 5,
                'order' => 17,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 10,
                'question_type_id' => 1,
                'question' => 'Intentas comprender el enfado de las otras personas.',
                'points' => 5,
                'order' => 18,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 10,
                'question_type_id' => 1,
                'question' => 'Permites que los demás sepan que tú te interesas o te preocupas por ellos.',
                'points' => 5,
                'order' => 19,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 10,
                'question_type_id' => 1,
                'question' => 'Cuándo sientes miedo, piensas por qué lo sientes, y luego intentas hacer algo para disminuirlo.',
                'points' => 5,
                'order' => 20,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 10,
                'question_type_id' => 1,
                'question' => 'Te das a ti misma(o) una recompensa después de hacer algo bien.',
                'points' => 5,
                'order' => 21,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Sabes cuándo es necesario pedir permiso para hacer algo y luego se lo pides a la persona indicada.',
                'points' => 5,
                'order' => 22,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Compartes tus cosas con los demás.',
                'points' => 5,
                'order' => 23,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Ayudas a quien lo necesita.',
                'points' => 5,
                'order' => 24,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Si tú y alguien están en desacuerdo sobre algo, tratas de llegar a un acuerdo que satisfaga a ambos.',
                'points' => 5,
                'order' => 25,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Controlas tu carácter de modo que no se te escapan las cosas de la mano.',
                'points' => 5,
                'order' => 26,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Defiendes tus derechos dando a conocer a los demás cuál es tu punto de vista.',
                'points' => 5,
                'order' => 27,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Conservas el control cuando los demás te hacen bromas.',
                'points' => 5,
                'order' => 28,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Te mantienes al margen de situaciones que te pueden ocasionar problemas.',
                'points' => 5,
                'order' => 29,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 11,
                'question_type_id' => 1,
                'question' => 'Encuentras otras formas para resolver situaciones difíciles sin tener que pelearte.',
                'points' => 5,
                'order' => 30,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Le dices a los demás de modo claro, pero no con enfado, cuando ellos han hecho algo que no te gusta.',
                'points' => 5,
                'order' => 31,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Intentas escuchar a los demás y responder imparcialmente cuando ellos se quejan por ti.',
                'points' => 5,
                'order' => 32,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Expresas un halago sincero a los demás por la forma en que han jugado.',
                'points' => 5,
                'order' => 33,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Haces algo que te ayude a sentir menos vergüenza o a estar menos cohibido(a).',
                'points' => 5,
                'order' => 34,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Determinas si te han dejado de lado en alguna actividad y, luego, haces algo para sentirte mejor en esa situación.',
                'points' => 5,
                'order' => 35,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Manifiestas a los demás cuando sientes que una amiga no ha sido tratada de manera justa.',
                'points' => 5,
                'order' => 36,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Si alguien está tratando de convencerte de algo, piensas en la posición de esa persona y luego en la propia antes de decidir qué hacer.',
                'points' => 5,
                'order' => 37,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Intentas comprender la razón por la cual has fracasado en una situación particular.',
                'points' => 5,
                'order' => 38,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Reconoces y resuelves la confusión que te produce cuando los demás te explican una cosa, pero dicen y hacen otra.',
                'points' => 5,
                'order' => 39,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Comprendes de qué y por qué has sido acusada(o) y luego piensas en la mejor forma de relacionarte con la persona que hizo la acusación.',
                'points' => 5,
                'order' => 40,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Planificas la mejor forma para exponer tu punto de vista antes de una conversación problemática.',
                'points' => 5,
                'order' => 41,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 12,
                'question_type_id' => 1,
                'question' => 'Decides lo que quieres hacer cuando los demás quieren que hagas otra cosa distinta.',
                'points' => 5,
                'order' => 42,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 13,
                'question_type_id' => 1,
                'question' => 'Si te sientes aburrida(o), intentas encontrar algo interesante que hacer.',
                'points' => 5,
                'order' => 43,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 13,
                'question_type_id' => 1,
                'question' => 'Si surge un problema, intentas determinar qué lo causó.',
                'points' => 5,
                'order' => 44,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 13,
                'question_type_id' => 1,
                'question' => 'Tomas decisiones realistas sobre lo que te gustaría realizar antes de comenzar una tarea.',
                'points' => 5,
                'order' => 45,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 13,
                'question_type_id' => 1,
                'question' => 'Determinas de manera realista qué tan bien podrías realizar antes de comenzar una tarea.',
                'points' => 5,
                'order' => 46,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 13,
                'question_type_id' => 1,
                'question' => 'Determinas lo que necesitas saber y cómo conseguir la información.',
                'points' => 5,
                'order' => 47,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 13,
                'question_type_id' => 1,
                'question' => 'Determinas de forma realista cuál de tus numerosos problemas es el más importante y cuál debería solucionarse primero.',
                'points' => 5,
                'order' => 48,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 13,
                'question_type_id' => 1,
                'question' => 'Analizas entre varias posibilidades y luego eliges la que te hará sentirte mejor.',
                'points' => 5,
                'order' => 49,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
            [
                'battery_id' => 4,
                'battery_category_id' => 13,
                'question_type_id' => 1,
                'question' => 'Eres capaz de ignorar distracciones y solo prestas atención a lo que quieres hacer.',
                'points' => 5,
                'order' => 50,
                'is_active' => true,
                'options' => [
                    [ 'option_text' => 'Nunca',           'points' => 1 ],
                    [ 'option_text' => 'Muy pocas veces', 'points' => 2 ],
                    [ 'option_text' => 'Alguna vez',      'points' => 3 ],
                    [ 'option_text' => 'A menudo',        'points' => 4 ],
                    [ 'option_text' => 'Siempre',         'points' => 5 ],
                ]
            ],
        ];

        foreach($socialSkillsQuestions as $question) {
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
