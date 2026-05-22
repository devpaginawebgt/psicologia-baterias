@props(['responses'])

@if($responses->isEmpty())
    <div class="text-center text-zinc-400 py-8">
        Aún no has respondido a esta escala.
    </div>
@else
    <div class="space-y-4">
        @foreach($responses as $submission)
            <div class="border border-zinc-700 rounded p-3">
                <div class="text-xs text-zinc-400 mb-2">
                    Intento {{ $loop->iteration }}
                    @if($submission->submittion_date)   
                        — {{ $submission->submittion_date->format('d/m/Y H:i') }}
                    @endif
                </div>
                <ul class="text-sm space-y-1">
                    @foreach($submission->responses as $response)
                        <li class="flex justify-between gap-2">
                            <span class="text-zinc-300">Pregunta {{ $response->question_id }}</span>
                            <span class="font-semibold">{{ $response->response_text ?? $response->points }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endif
