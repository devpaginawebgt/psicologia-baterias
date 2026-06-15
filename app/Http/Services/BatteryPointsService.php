<?php

namespace App\Http\Services;

use App\Models\BatteryEmployee;

class BatteryPointsService {

    public const DefaultLevel = 'Sin respuesta';
    public const DefaultPoints = 0;

    //! ESCALA DE ESTRÉS

    public function getStressResult(BatteryEmployee $battery)
    {
        $points = $battery->response_points;

        if (is_null($points)) {
            return [
                'level'  => $this::DefaultLevel,
                'points' => $this::DefaultPoints,
            ];
        }

        $levels = [
            1 => [
                'title'   => 'Bajo',
                'content' => 'Percibes un nivel relativamente bajo de estrés en tu vida diaria. Generalmente, esto sugiere que estás manejando bien las demandas y no experimentas una carga emocional o física significativa. Sin embargo, siempre es bueno estar atento a cambios o signos de agotamiento.',
            ],
            2 => [
                'title'   => 'Moderado',
                'content' => 'Percibes un nivel de estrés que puede estar afectando tu bienestar, pero no de manera severa. Es un momento en el que puede ser útil tomar medidas para gestionar mejor el estrés, como técnicas de relajación, ejercicio o buscar apoyo. <b>Buscar ayuda profesional puede ser muy beneficioso para prevenir que el estrés se convierta en un problema más serio</b>.',
            ],
            3 => [
                'title'   => 'Alto',
                'content' => 'Percibes un nivel alto de estrés, lo cual puede estar afectando tu salud física y emocional. En estos casos, un psicólogo puede ser muy recomendable para explorar las causas del estrés, aprender estrategias de afrontamiento y prevenir posibles problemas de salud mental. <b>Buscar ayuda profesional puede ser muy beneficioso para prevenir que el estrés se convierta en un problema más serio</b>.',
            ],
        ];

        $resolveLevel = fn (int $points) => match (true) {
            $points < 14 => 1,
            $points < 27 => 2,
            default      => 3,
        };

        $level = $levels[$resolveLevel($points)];

        return (object) [
            'level' => $level['title'],
            'points' => $points,
        ];
    }

    //! ESCALA DE INTELIGENCIA EMOCIONAL

    public function getEmotionalResult(BatteryEmployee $battery)
    {
        $points = $battery->response_points;

        if (is_null($points)) {
            return (object) [
                'level'  => $this::DefaultLevel,
                'points' => $this::DefaultPoints,
                'sublevels' => collect([
                    1 => [
                        'level'  => $this::DefaultLevel,
                        'points' => $this::DefaultPoints,
                    ],
                    2 => [
                        'level'  => $this::DefaultLevel,
                        'points' => $this::DefaultPoints,
                    ],
                    3 => [
                        'level'  => $this::DefaultLevel,
                        'points' => $this::DefaultPoints,
                    ],
                ]),
            ];
        }

        $levels = [
            1 => [
                'title'   => 'Baja',
                'content' => 'Indica que hay áreas significativas en las que puedes mejorar en términos de inteligencia emocional. Es posible que tengas dificultades en reconocer, entender o gestionar tus emociones y las de los demás.',
            ],
            2 => [
                'title'   => 'Moderada',
                'content' => 'Sugiere que tienes habilidades emocionales en desarrollo. Puedes manejar bien muchas situaciones, pero aún hay espacio para fortalecer aspectos específicos.',
            ],
            3 => [
                'title'   => 'Alta',
                'content' => 'Refleja un nivel fuerte de inteligencia emocional. Probablemente eres consciente de tus emociones, las entiendes bien y sabes cómo regularte en diferentes contextos.',
            ],
            4 => [
                'title'   => 'Muy alta',
                'content' => 'Indica una excelente competencia emocional, con habilidades sólidas para gestionar tus emociones y relacionarte efectivamente con los demás.',
            ],
        ];

        $resolveLevel = fn (int $points) => match (true) {
            $points < 71  => 1,
            $points < 101 => 2,
            $points < 131 => 3,
            default       => 4,
        };

        $level = $levels[$resolveLevel($points)];

        // Puntaje por dimensión (battery_category_id según BatteryCategorySeeder)
        //   1 => Atención, 2 => Claridad, 3 => Reparación
        $categoryDefinitions = collect([
            1 => [
                'name'     => 'Atención emocional',
                'resolver' => fn ($p) => match (true) {
                    $p <= 20 => 1,
                    $p <= 26 => 2,
                    default  => 3,
                },
                'levels' => [
                    1 => ['title' => 'Baja',     'content' => 'Puede indicar que no prestas suficiente atención a tus emociones o que tienes dificultades para reconocer cómo te sientes.'],
                    2 => ['title' => 'Moderada', 'content' => 'Sugiere que prestas atención a tus emociones, pero quizás aún puedes mejorar en ser más consciente de ellas.'],
                    3 => ['title' => 'Alta',     'content' => 'Indica que estás muy atento a tus sentimientos, lo que te ayuda a entenderte mejor y a responder de manera adecuada.'],
                ],
            ],
            2 => [
                'name'     => 'Claridad emocional',
                'resolver' => fn ($p) => match (true) {
                    $p <= 20 => 1,
                    $p <= 30 => 2,
                    default  => 3,
                },
                'levels' => [
                    1 => ['title' => 'Baja',     'content' => 'Puede reflejar dificultades para entender o identificar claramente tus emociones.'],
                    2 => ['title' => 'Moderada', 'content' => 'Muestra que tienes una buena comprensión de tus sentimientos, aunque aún hay espacio para profundizar en esa autoconciencia.'],
                    3 => ['title' => 'Alta',     'content' => 'Indica una gran capacidad para entender y distinguir tus emociones con claridad.'],
                ],
            ],
            3 => [
                'name'     => 'Reparación de las emociones',
                'resolver' => fn ($p) => match (true) {
                    $p <= 20 => 1,
                    $p <= 27 => 2,
                    default  => 3,
                },
                'levels' => [
                    1 => ['title' => 'Baja',     'content' => 'Sugiere que quizás tienes dificultades para regular o mejorar tus estados emocionales cuando es necesario.'],
                    2 => ['title' => 'Moderada', 'content' => 'Indica que puedes gestionar tus emociones en muchas situaciones, pero aún puedes fortalecer esa habilidad.'],
                    3 => ['title' => 'Alta',     'content' => 'Refleja una buena capacidad para regular y reparar tus emociones, ayudándote a mantener un equilibrio emocional.'],
                ],
            ],
        ]);

        $pointsByCategory = fn ($submission) => $submission?->responses->groupBy('battery_category_id')->map->sum('points') ?? collect();

        $categoryPoints = $pointsByCategory($battery);        

        $sublevels = $categoryDefinitions->map(function($definition, $categoryId) use ($categoryPoints) {
            $catPoints = $categoryPoints->get($categoryId, 0);
            $catLevel  = $definition['levels'][$definition['resolver']($catPoints)];

            return (object) [
                'points' => $catPoints,
                'level'  => $catLevel['title'],
            ];
        });

        return (object) [
            'level'     => $level['title'],
            'points'    => $points,
            'sublevels' => $sublevels,
        ];
    }

    //! ESCALA DE FELICIDAD

    public function getHappinessResult(BatteryEmployee $battery)
    {
        $points = $battery->response_points;

        if (is_null($points)) {
            return (object) [
                'level'     => $this::DefaultLevel,
                'points'    => $this::DefaultPoints,
                'sublevels' => collect([
                    4 => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
                    5 => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
                    6 => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
                    7 => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
                ]),
            ];
        }

        $levels = [
            1 => [
                'title'   => 'Muy baja',
                'content' => 'Probablemente te sientes descontento, con dificultades emocionales o de bienestar que impactan significativamente tu calidad de vida.',
            ],
            2 => [
                'title'   => 'Baja',
                'content' => 'Puedes estar experimentando insatisfacción o dificultades que afectan tu percepción de bienestar.',
            ],
            3 => [
                'title'   => 'Media',
                'content' => 'La satisfacción y el bienestar son moderados, y puede haber altibajos en cómo percibes tu vida.',
            ],
            4 => [
                'title'   => 'Alta',
                'content' => 'Generalmente te sientes bien y tienes una percepción positiva de tu vida.',
            ],
            5 => [
                'title'   => 'Muy alta',
                'content' => 'Te sientes muy satisfecho(a) y positivo(a) respecto a tu bienestar y tu vida en general.',
            ],
        ];

        $resolveLevel = fn (int $points) => match (true) {
            $points < 88  => 1,
            $points < 96  => 2,
            $points < 111 => 3,
            $points < 119 => 4,
            default       => 5,
        };

        $level = $levels[$resolveLevel($points)];

        // Puntaje por dimensión (battery_category_id según BatteryCategorySeeder)
        //   4 => Sentido positivo de la vida, 5 => Satisfacción con la vida,
        //   6 => Realización personal,        7 => Alegría de vivir
        $categoryDefinitions = collect([
            4 => [
                'name' => 'Sentido positivo de la vida',
                // Escala invertida: menos puntos = mejor percepción
                'resolver' => fn ($p) => match (true) {
                    $p <= 24 => 4,
                    $p <= 38 => 3,
                    $p <= 51 => 2,
                    default  => 1,
                },
                'levels' => [
                    1 => ['title' => 'Baja'],
                    2 => ['title' => 'Media'],
                    3 => ['title' => 'Alta'],
                    4 => ['title' => 'Muy alta'],
                ],
            ],
            5 => [
                'name' => 'Satisfacción con la vida',
                'resolver' => fn ($p) => match (true) {
                    $p <= 12 => 1,
                    $p <= 18 => 2,
                    $p <= 24 => 3,
                    default  => 4,
                },
                'levels' => [
                    1 => ['title' => 'Baja'],
                    2 => ['title' => 'Media'],
                    3 => ['title' => 'Alta'],
                    4 => ['title' => 'Muy alta'],
                ],
            ],
            6 => [
                'name' => 'Realización personal',
                'resolver' => fn ($p) => match (true) {
                    $p <= 12 => 1,
                    $p <= 18 => 2,
                    $p <= 24 => 3,
                    default  => 4,
                },
                'levels' => [
                    1 => ['title' => 'Baja'],
                    2 => ['title' => 'Media'],
                    3 => ['title' => 'Alta'],
                    4 => ['title' => 'Muy alta'],
                ],
            ],
            7 => [
                'name' => 'Alegría de vivir',
                'resolver' => fn ($p) => match (true) {
                    $p <= 8  => 1,
                    $p <= 12 => 2,
                    $p <= 16 => 3,
                    default  => 4,
                },
                'levels' => [
                    1 => ['title' => 'Baja'],
                    2 => ['title' => 'Media'],
                    3 => ['title' => 'Alta'],
                    4 => ['title' => 'Muy alta'],
                ],
            ],
        ]);

        $pointsByCategory = fn ($submission) => $submission?->responses->groupBy('battery_category_id')->map->sum('points') ?? collect();

        $categoryPoints = $pointsByCategory($battery);

        $sublevels = $categoryDefinitions->map(function($definition, $categoryId) use ($categoryPoints) {
            $catPoints = $categoryPoints->get($categoryId, 0);
            $catLevel  = $definition['levels'][$definition['resolver']($catPoints)];

            return (object) [
                'points' => $catPoints,
                'level'  => $catLevel['title'],
            ];
        });

        return (object) [
            'level'     => $level['title'],
            'points'    => $points,
            'sublevels' => $sublevels,
        ];
    }

    //! ESCALA DE HABILIDADES SOCIALES

    public function getSocialResult(BatteryEmployee $battery)
    {
        $points = $battery->response_points;

        $defaultSublevels = collect([
            8  => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
            9  => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
            10 => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
            11 => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
            12 => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
            13 => (object) ['level' => $this::DefaultLevel, 'points' => $this::DefaultPoints],
        ]);

        if (is_null($points)) {
            return (object) [
                'level'     => $this::DefaultLevel,
                'points'    => $this::DefaultPoints,
                'sublevels' => $defaultSublevels,
            ];
        }

        $levels = [
            1 => ['title' => 'Deficiente Nivel'],
            2 => ['title' => 'Bajo Nivel'],
            3 => ['title' => 'Normal Nivel'],
            4 => ['title' => 'Buen Nivel'],
            5 => ['title' => 'Excelente Nivel'],
        ];

        // Resolver por Puntaje Directo
        $resolveLevel = fn (int $points) => match (true) {
            $points <= 25  => 1,
            $points <= 77  => 2,
            $points <= 156 => 3,
            $points <= 204 => 4,
            default        => 5,
        };

        $level = $levels[$resolveLevel($points)];

        // Puntaje por dimensión (battery_category_id según BatteryCategorySeeder)
        //   8  => Primeras habilidades sociales
        //   9  => Habilidades sociales avanzadas
        //   10 => Habilidades relacionadas con los sentimientos
        //   11 => Habilidades alternativas a la agresión
        //   12 => Habilidades para hacer frente al estrés
        //   13 => Habilidades de Planificación
        $categoryIds = [8, 9, 10, 11, 12, 13];

        // Máximo de puntos posibles por categoría = suma de `points` de las
        // preguntas activas de esa categoría en la batería.
        $maxPointsByCategory = $battery->battery?->questions
            ->where('is_active', true)
            ->groupBy('battery_category_id')
            ->map->sum('points') ?? collect();

        $categoryPoints = $battery->responses->groupBy('battery_category_id')->map->sum('points');

        // Resolver de nivel por categoría usando percentil (puntos obtenidos / máximo posible).
        $resolveCategoryLevel = function (int $points, int $max) {
            if ($max <= 0) return 1;

            $percentile = ($points * 100) / $max;
            return match (true) {
                $percentile <= 25 => 1,
                $percentile <= 42 => 2,
                $percentile <= 57 => 3,
                $percentile <= 74 => 4,
                default           => 5,
            };
        };

        $sublevels = collect($categoryIds)->mapWithKeys(function ($categoryId) use ($categoryPoints, $maxPointsByCategory, $levels, $resolveCategoryLevel) {
            $catPoints = $categoryPoints->get($categoryId, 0);
            $catMax    = $maxPointsByCategory->get($categoryId, 0);
            $catLevel  = $levels[$resolveCategoryLevel($catPoints, $catMax)];

            return [$categoryId => (object) [
                'points' => $catPoints,
                'level'  => $catLevel['title'],
            ]];
        });

        return (object) [
            'level'     => $level['title'],
            'points'    => $points,
            'sublevels' => $sublevels,
        ];
    }

}

?>