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
    }
}
