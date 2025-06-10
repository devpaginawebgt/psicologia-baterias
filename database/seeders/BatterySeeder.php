<?php

namespace Database\Seeders;

use App\Models\Battery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Battery::create([
            'name' => 'Estrés percibido',
            'url' => 'estres-percibido',
            'description' => 'Las preguntas en esta escala hacen referencia a tus sentimientos y pensamientos durante el último mes. En cada caso, por favor marca en las opciones cómo te has sentido o cómo has enfrentado cada situación.',
        ]);

        Battery::create([
            'name' => 'Inteligencia Emocional',
            'url' => 'inteligencia-emocional',
            'description' => 'Lee las siguientes afirmaciones sobre tus emociones y sentimientos e indica el grado de acuerdo desacuerdo con respecto a las mismas. No olvides que no hay respuestas correctas o incorrectas, marca la que más se aproxime a tu preferencia.'
        ]);

        Battery::create([
            'name' => 'Felicidad',
            'url' => 'felicidad',
            'description' => 'Al empezar encontrará una serie de afirmaciones, lea detenidamente cada afirmación y luego utiliza la escala para indicar su grado de aceptación o rechazo. No hay respuestas buenas ni malas.'
        ]);
    }
}
