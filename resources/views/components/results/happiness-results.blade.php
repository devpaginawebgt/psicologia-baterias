@props(['responses', 'battery', 'employee'])

<h2 class="text-lg font-semibold text-center mt-2 mb-1">
    {{ $battery->name }}
</h2>

<p class="text-sm text-zinc-400 text-center mb-6">
    {{ $employee->name }} {{ $employee->lastname }}
</p>

@php
    $levels = [
        1 => [
            'title'   => 'Felicidad muy baja',
            'content' => 'Probablemente te sientes descontento, con dificultades emocionales o de bienestar que impactan significativamente tu calidad de vida. Es importante considerar el contexto individual y otros aspectos que puedan influir en tu bienestar. No eres el problema. Tu sistema emocional está sobrecargado o desregulado. Se recomienda estructura y regulación.',
        ],
        2 => [
            'title'   => 'Felicidad baja',
            'content' => 'Puedes estar experimentando insatisfacción o dificultades que afectan tu percepción de bienestar. Es importante considerar el contexto individual y otros aspectos que puedan influir en tu bienestar. No eres el problema. Tu sistema emocional está sobrecargado o desregulado. Se recomienda estructura y regulación.',
        ],
        3 => [
            'title'   => 'Felicidad media',
            'content' => 'La satisfacción y el bienestar son moderados, y puede haber altibajos en cómo percibes tu vida. Es importante considerar el contexto individual y otros aspectos que puedan influir en tu bienestar. Haz consciente lo que te hace bien y protégelo como si fuera un tratamiento. Reconoce lo que  impide tu satisfacción y trabaja con ella.',
        ],
        4 => [
            'title'   => 'Felicidad alta',
            'content' => 'Generalmente te sientes bien y tienes una percepción positiva de tu vida. Es importante considerar el contexto individual y otros aspectos que puedan influir en tu bienestar. Haz consciente lo que te hace bien y protégelo como si fuera un tratamiento, sigue reforzando conductas satisfactorias.',
        ],
        5 => [
            'title'   => 'Felicidad muy alta',
            'content' => 'Te sientes muy satisfecho(a) y positivo(a) respecto a tu bienestar y tu vida en general. Es importante considerar el contexto individual y otros aspectos que puedan influir en tu bienestar. Haz consciente lo que te hace bien y protégelo como si fuera un tratamiento.',
        ],
    ];

    $resolveLevel = fn (int $points) => match (true) {
        $points < 88  => 1,
        $points < 96  => 2,
        $points < 111 => 3,
        $points < 119 => 4,
        default       => 5,
    };

    // Puntaje por dimensión (battery_category_id según BatteryCategorySeeder)
    $categoryDefinitions = [
        4 => [
            'name'     => 'Sentido positivo de la vida',
            // Escala invertida: menos puntos = mejor percepción
            'resolver' => fn ($p) => match (true) {
                $p <= 24 => 4,
                $p <= 38 => 3,
                $p <= 51 => 2,
                default  => 1,
            },
            'levels' => [
                1 => ['title' => 'Baja',     'range' => '52 o más',    'content' => 'La percepción del sentido positivo en la vida es muy baja, lo que puede indicar sentimientos de desesperanza o falta de propósito.'],
                2 => ['title' => 'Media',    'range' => '39 a 51',     'content' => 'Tienes una percepción moderada del sentido positivo, pero aún puedes experimentar dificultades en encontrar significado.'],
                3 => ['title' => 'Alta',     'range' => '25 a 38',     'content' => 'La percepción del sentido positivo de la vida es buena, lo que contribuye a una mayor satisfacción y bienestar.'],
                4 => ['title' => 'Muy alta', 'range' => 'menos de 24', 'content' => 'Tienes un sentido muy fuerte y positivo de la vida, lo que generalmente se asocia con altos niveles de felicidad.'],
            ],
        ],
        5 => [
            'name'     => 'Satisfacción con la vida',
            'resolver' => fn ($p) => match (true) {
                $p <= 12 => 1,
                $p <= 18 => 2,
                $p <= 24 => 3,
                default  => 4,
            },
            'levels' => [
                1 => ['title' => 'Baja',     'range' => '6 a 12',   'content' => 'La satisfacción general con la vida es muy baja, lo que puede reflejar insatisfacción o dificultades importantes.'],
                2 => ['title' => 'Media',    'range' => '13 a 18',  'content' => 'La satisfacción con la vida es moderada, con sentimientos positivos pero con áreas que podrían mejorar.'],
                3 => ['title' => 'Alta',     'range' => '19 a 24',  'content' => 'Bastante satisfacción con tu vida, lo que favorece tu bienestar emocional.'],
                4 => ['title' => 'Muy alta', 'range' => '25 o más', 'content' => 'La satisfacción con tu vida es muy elevada, indicando un alto nivel de felicidad y bienestar.'],
            ],
        ],
        6 => [
            'name'     => 'Realización personal',
            'resolver' => fn ($p) => match (true) {
                $p <= 12 => 1,
                $p <= 18 => 2,
                $p <= 24 => 3,
                default  => 4,
            },
            'levels' => [
                1 => ['title' => 'Baja',     'range' => '6 a 12',   'content' => 'La sensación de realización personal es muy baja, lo que puede afectar tu autoestima y la felicidad general.'],
                2 => ['title' => 'Media',    'range' => '13 a 18',  'content' => 'La realización personal es moderada, con espacio para mejorar en sentir que se alcanzan metas y sueños.'],
                3 => ['title' => 'Alta',     'range' => '19 a 24',  'content' => 'Sientes bastante realización, lo que contribuye a tu felicidad.'],
                4 => ['title' => 'Muy alta', 'range' => '25 o más', 'content' => 'La realización personal es muy alta, reflejando un fuerte sentido de logro y satisfacción en la vida.'],
            ],
        ],
        7 => [
            'name'     => 'Alegría de vivir',
            'resolver' => fn ($p) => match (true) {
                $p <= 8  => 1,
                $p <= 12 => 2,
                $p <= 16 => 3,
                default  => 4,
            },
            'levels' => [
                1 => ['title' => 'Baja',     'range' => '4 a 8',    'content' => 'La alegría de vivir es muy baja, lo que puede indicar tristeza o falta de entusiasmo.'],
                2 => ['title' => 'Media',    'range' => '9 a 12',   'content' => 'La alegría de vivir es moderada, con sentimientos positivos pero no constantes.'],
                3 => ['title' => 'Alta',     'range' => '13 a 16',  'content' => 'Experimentas bastante alegría y entusiasmo en tu día a día.'],
                4 => ['title' => 'Muy alta', 'range' => '17 o más', 'content' => 'La alegría de vivir es muy alta, lo que generalmente se asocia con una felicidad plena y entusiasmo por la vida.'],
            ],
        ],
    ];

    $pointsByCategory = fn ($submission) =>
        $submission?->responses->groupBy('battery_category_id')->map->sum('points') ?? collect();

    $firstSubmission  = $responses->get(0);
    $secondSubmission = $responses->get(1);
@endphp

<div class="space-y-6">
    {{-- Primera fase: respuesta inicial --}}
    <div class="border border-zinc-700 rounded p-4">
        <div class="mb-4 text-sm flex items-center justify-between">
            <span class="text-zinc-300">Primera fase</span>
            @if($firstSubmission?->submittion_date)
                <span class="text-zinc-400">{{ $firstSubmission->submittion_date->format('d/m/Y H:i') }}</span>
            @endif
        </div>

        <div class="flex flex-col items-center text-center gap-1">
            @if($firstSubmission)
            @php
                $info = $levels[$resolveLevel($firstSubmission->response_points)];
            @endphp
                {{-- <p class="text-lg font-semibold">
                    Puntaje total: {{ $firstSubmission->response_points }}
                </p> --}}
                <p class="text-lg font-semibold">
                    {{ $info['title'] }}
                </p>
                <p class="text-sm text-zinc-300">
                    {!! $info['content'] !!}
                </p>

                @php
                    $categoryPoints = $pointsByCategory($firstSubmission);
                @endphp

                <div class="mt-8 w-full text-center">
                    <h3 class="font-semibold text-sm uppercase tracking-wide text-zinc-200 mb-3">
                        Puntaje por dimensión
                    </h3>
                    <ul class="space-y-6 text-sm">
                        @foreach($categoryDefinitions as $categoryId => $definition)
                            @php
                                $points  = $categoryPoints->get($categoryId, 0);
                                $catInfo = $definition['levels'][$definition['resolver']($points)];
                            @endphp
                            <li>
                                <p class="font-semibold mb-1">
                                    {{ $definition['name'] }} 
                                    {{-- <span class="text-zinc-400">— {{ $points }} pts</span> --}}
                                </p>
                                <p class="text-zinc-300">
                                    <span class="font-semibold">{{ $catInfo['title'] }}:</span>
                                    {{ $catInfo['content'] }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p class="text-lg font-semibold text-zinc-400">No has respondido a la escala.</p>
            @endif
        </div>
    </div>

    {{-- Segunda fase: asistencia a talleres --}}
    <div class="border border-zinc-700 rounded p-4">
        <div class="mb-4 text-sm">
            <span class="text-zinc-300">Segunda fase — Talleres</span>
        </div>

        <ul class="text-sm space-y-2">
            <li class="flex items-center gap-2">
                <x-mary-icon
                    name="{{ $employee->emotional_social_session ? 'o-check-circle' : 'o-x-circle' }}"
                    class="w-5 {{ $employee->emotional_social_session ? 'text-green-500' : 'text-zinc-500' }}"
                />
                <span>
                    Taller de habilidades sociales
                    <span class="text-zinc-400">
                        — {{ $employee->emotional_social_session ? 'Asistió' : 'No asistió' }}
                    </span>
                </span>
            </li>
            <li class="flex items-center gap-2">
                <x-mary-icon
                    name="{{ $employee->emotional_management_session ? 'o-check-circle' : 'o-x-circle' }}"
                    class="w-5 {{ $employee->emotional_management_session ? 'text-green-500' : 'text-zinc-500' }}"
                />
                <span>
                    Taller de manejo emocional
                    <span class="text-zinc-400">
                        — {{ $employee->emotional_management_session ? 'Asistió' : 'No asistió' }}
                    </span>
                </span>
            </li>
        </ul>
    </div>

    {{-- Tercera fase: respuesta posterior a talleres --}}
    <div class="border border-zinc-700 rounded p-4">
        <div class="mb-4 text-sm flex items-center justify-between">
            <span class="text-zinc-300">Tercera fase</span>
            @if($secondSubmission?->submittion_date)
                <span class="text-zinc-400">{{ $secondSubmission->submittion_date->format('d/m/Y H:i') }}</span>
            @endif
        </div>

        <div class="flex flex-col items-center text-center gap-1">
            @if($secondSubmission)
                @php
                    $info = $levels[$resolveLevel($secondSubmission->response_points)];
                @endphp
                {{-- <p class="text-lg font-semibold">
                    Puntaje total: {{ $secondSubmission->response_points }}
                </p> --}}
                <p class="text-lg font-semibold mt-2">
                    {{ $info['title'] }}
                </p>
                <p class="text-sm text-zinc-300">
                    {!! $info['content'] !!}
                </p>

                @php
                    $categoryPoints = $pointsByCategory($secondSubmission);
                @endphp

                <div class="mt-8 w-full text-center">
                    <h3 class="font-semibold text-sm uppercase tracking-wide text-zinc-200 mb-3">
                        Puntaje por dimensión
                    </h3>
                    <ul class="space-y-6 text-sm">
                        @foreach($categoryDefinitions as $categoryId => $definition)
                            @php
                                $points  = $categoryPoints->get($categoryId, 0);
                                $catInfo = $definition['levels'][$definition['resolver']($points)];
                            @endphp
                            <li>
                                <p class="font-semibold mb-1">
                                    {{ $definition['name'] }}
                                    {{-- <span class="text-zinc-400">— {{ $points }} pts</span> --}}
                                </p>
                                <p class="text-zinc-300">
                                    <span class="font-semibold">{{ $catInfo['title'] }}:</span>
                                    {{ $catInfo['content'] }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p class="text-lg font-semibold text-zinc-400">No has respondido a la escala.</p>
            @endif
        </div>
    </div>
</div>
