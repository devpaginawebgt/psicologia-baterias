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
            'title'   => 'Puntaje bajo',
            'content' => 'Indica que hay áreas significativas en las que puedes mejorar en términos de inteligencia emocional. Es posible que tengas dificultades en reconocer, entender o gestionar tus emociones y las de los demás.',
        ],
        2 => [
            'title'   => 'Puntaje moderado',
            'content' => 'Sugiere que tienes habilidades emocionales en desarrollo. Puedes manejar bien muchas situaciones, pero aún hay espacio para fortalecer aspectos específicos.',
        ],
        3 => [
            'title'   => 'Puntaje alto',
            'content' => 'Refleja un nivel fuerte de inteligencia emocional. Probablemente eres consciente de tus emociones, las entiendes bien y sabes cómo regularte en diferentes contextos.',
        ],
        4 => [
            'title'   => 'Puntaje muy alto',
            'content' => 'Indica una excelente competencia emocional, con habilidades sólidas para gestionar tus emociones y relacionarte efectivamente con los demás.',
        ],
    ];

    $resolveLevel = fn (int $points) => match (true) {
        $points < 71  => 1,
        $points < 101 => 2,
        $points < 131 => 3,
        default       => 4,
    };

    // Puntaje por dimensión (battery_category_id según BatteryCategorySeeder)
    //   1 => Atención, 2 => Claridad, 3 => Reparación
    $categoryDefinitions = [
        1 => [
            'name'     => 'Atención emocional',
            'resolver' => fn ($p) => match (true) {
                $p <= 20 => 1,
                $p <= 26 => 2,
                default  => 3,
            },
            'levels' => [
                1 => ['title' => 'Bajo',     'range' => '0 - 20',   'content' => 'Puede indicar que no prestas suficiente atención a tus emociones o que tienes dificultades para reconocer cómo te sientes.'],
                2 => ['title' => 'Moderado', 'range' => '21 - 26',  'content' => 'Sugiere que prestas atención a tus emociones, pero quizás aún puedes mejorar en ser más consciente de ellas.'],
                3 => ['title' => 'Alto',     'range' => '27 y más', 'content' => 'Indica que estás muy atento a tus sentimientos, lo que te ayuda a entenderte mejor y a responder de manera adecuada.'],
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
                1 => ['title' => 'Bajo',     'range' => '0 - 20',   'content' => 'Puede reflejar dificultades para entender o identificar claramente tus emociones.'],
                2 => ['title' => 'Moderado', 'range' => '21 - 30',  'content' => 'Muestra que tienes una buena comprensión de tus sentimientos, aunque aún hay espacio para profundizar en esa autoconciencia.'],
                3 => ['title' => 'Alto',     'range' => '31 y más', 'content' => 'Indica una gran capacidad para entender y distinguir tus emociones con claridad.'],
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
                1 => ['title' => 'Bajo',     'range' => '0 - 20',   'content' => 'Sugiere que quizás tienes dificultades para regular o mejorar tus estados emocionales cuando es necesario.'],
                2 => ['title' => 'Moderado', 'range' => '21 - 27',  'content' => 'Indica que puedes gestionar tus emociones en muchas situaciones, pero aún puedes fortalecer esa habilidad.'],
                3 => ['title' => 'Alto',     'range' => '28 y más', 'content' => 'Refleja una buena capacidad para regular y reparar tus emociones, ayudándote a mantener un equilibrio emocional.'],
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
            <span class="text-zinc-300">Pre-test</span>
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
            <span class="text-zinc-300">Talleres</span>
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
            <span class="text-zinc-300">Post-test</span>
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
