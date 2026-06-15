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
            'title'   => 'Bajo estrés',
            'content' => 'Percibes un nivel relativamente bajo de estrés en tu vida diaria. Generalmente, esto sugiere que estás manejando bien las demandas y no experimentas una carga emocional o física significativa. Sin embargo, siempre es bueno estar atento a cambios o signos de agotamiento.',
        ],
        2 => [
            'title'   => 'Estrés moderado',
            'content' => 'Percibes un nivel de estrés que puede estar afectando tu bienestar, pero no de manera severa. Es un momento en el que puede ser útil tomar medidas para gestionar mejor el estrés, como técnicas de relajación, ejercicio o buscar apoyo. <b>Buscar ayuda profesional puede ser muy beneficioso para prevenir que el estrés se convierta en un problema más serio</b>.',
        ],
        3 => [
            'title'   => 'Alto estrés',
            'content' => 'Percibes un nivel alto de estrés, lo cual puede estar afectando tu salud física y emocional. En estos casos, un psicólogo puede ser muy recomendable para explorar las causas del estrés, aprender estrategias de afrontamiento y prevenir posibles problemas de salud mental. <b>Buscar ayuda profesional puede ser muy beneficioso para prevenir que el estrés se convierta en un problema más serio</b>.',
        ],
    ];

    $resolveLevel = fn (int $points) => match (true) {
        $points < 14 => 1,
        $points < 27 => 2,
        default      => 3,
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
                <p class="text-lg font-semibold mt-2">
                    {{ $info['title'] }}
                </p>
                <p class="text-sm text-zinc-300">
                    {!! $info['content'] !!}
                </p>
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
            @else
                <p class="text-lg font-semibold text-zinc-400">No has respondido a la escala.</p>
            @endif
        </div>
    </div>
</div>
