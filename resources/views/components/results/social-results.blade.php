@props(['responses', 'battery', 'employee'])

<h2 class="text-lg font-semibold text-center mt-2 mb-1">
    {{ $battery->name }}
</h2>

<p class="text-sm text-zinc-400 text-center mb-6">
    {{ $employee->name }} {{ $employee->lastname }}
</p>

@php
    // Total de puntos posibles en la escala completa
    $totalPossiblePoints = 250;

    $levels = [
        1 => [
            'title'   => 'Deficiente Nivel',
            'content' => 'Marcadas limitaciones en habilidades sociales; posible retraimiento, evitación o problemas significativos de interacción.',
        ],
        2 => [
            'title'   => 'Bajo Nivel',
            'content' => 'Dificultades frecuentes en interacción social, asertividad o regulación emocional interpersonal.',
        ],
        3 => [
            'title'   => 'Normal Nivel',
            'content' => 'Nivel promedio esperado; presenta recursos sociales funcionales aunque con áreas susceptibles de fortalecimiento.',
        ],
        4 => [
            'title'   => 'Buen Nivel',
            'content' => 'Adecuadas habilidades sociales, comunicación funcional y buena capacidad de interacción.',
        ],
        5 => [
            'title'   => 'Excelente Nivel',
            'content' => 'Repertorio muy desarrollado de habilidades sociales, alta competencia interpersonal, excelente adaptación social y emocional.',
        ],
    ];

    // Resolver por Puntaje Directo (columna 1 de la tabla)
    $resolveLevel = fn (int $points) => match (true) {
        $points <= 25  => 1, // Deficiente
        $points <= 77  => 2, // Bajo
        $points <= 156 => 3, // Normal
        $points <= 204 => 4, // Buen
        default        => 5, // Excelente
    };

    // Helper para mostrar el percentil calculado
    // $calculatePercentile = fn (int $points) =>
    //     (int) round(($points * 100) / $totalPossiblePoints);

    // Resolver por Percentil (columna 3 de la tabla)
    // $resolveLevelByPercentile = function (int $points) use ($totalPossiblePoints) {
    //     $percentile = ($points * 100) / $totalPossiblePoints;
    //     return match (true) {
    //         $percentile <= 25 => 1,
    //         $percentile <= 42 => 2,
    //         $percentile <= 57 => 3,
    //         $percentile <= 74 => 4,
    //         default           => 5,
    //     };
    // };

    // Puntaje por dimensión — solo nombres. Todas las categorías comparten los mismos
    // levels y umbrales de percentil de la batería (definidos arriba).
    // IDs 8–13 según BatteryCategorySeeder (battery_id=4).
    $categoryNames = [
        8  => 'Primeras habilidades sociales',
        9  => 'Habilidades sociales avanzadas',
        10 => 'Habilidades relacionadas con los sentimientos',
        11 => 'Habilidades alternativas a la agresión',
        12 => 'Habilidades para hacer frente al estrés',
        13 => 'Habilidades de Planificación',
    ];

    // Máximo de puntos posibles por categoría = suma de `points` de las
    // preguntas activas de esa categoría en esta batería.
    $maxPointsByCategory = $battery->questions
        ->where('is_active', true)
        ->groupBy('battery_category_id')
        ->map->sum('points');

    // Puntos obtenidos por el empleado por categoría.
    $pointsByCategory = fn ($submission) =>
        $submission?->responses->groupBy('battery_category_id')->map->sum('points') ?? collect();

    // Resolver de nivel por categoría usando percentil (puntos obtenidos / máximo posible).
    // Reutiliza los mismos thresholds que `$resolveLevelByPercentile` de la batería.
    $resolveCategoryLevel = function (int $categoryId, int $points) use ($maxPointsByCategory) {
        $max = $maxPointsByCategory->get($categoryId, 0);
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
                        @foreach($categoryNames as $categoryId => $name)
                            @php
                                // $max = $maxPointsByCategory->get($categoryId, 0);
                                $points = $categoryPoints->get($categoryId, 0);
                                $level  = $resolveCategoryLevel($categoryId, $points);
                            @endphp
                            <li class="flex items-center justify-between gap-3">
                                <span class="text-zinc-300 text-left">{{ $name }}</span>
                                {{-- <span>{{ $max }},  {{ $points }}</span> --}}
                                <span class="font-semibold text-right">{{ $levels[$level]['title'] }}</span>
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
                        @foreach($categoryNames as $categoryId => $name)
                            @php
                                // $max = $maxPointsByCategory->get($categoryId, 0);
                                $points = $categoryPoints->get($categoryId, 0);
                                $level  = $resolveCategoryLevel($categoryId, $points);
                            @endphp
                            <li class="flex items-center justify-between gap-3">
                                <span class="text-zinc-300 text-left">{{ $name }}</span>
                                {{-- <span>{{ $max }},  {{ $points }}</span> --}}
                                <span class="font-semibold text-right">{{ $levels[$level]['title'] }}</span>
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
