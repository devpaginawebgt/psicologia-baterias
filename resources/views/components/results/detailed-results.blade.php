@props(['responses'])

@if($responses->isEmpty())
    <div class="text-center text-zinc-400 py-8">
        Aún no has respondido a esta escala.
    </div>
@else
    <div class="space-y-4">
        @foreach($responses as $submission)
            <div class="border border-zinc-700 rounded p-3">
                <div class="text-xs text-zinc-400 mb-3">
                    Intento {{ $loop->iteration }}
                    <span class="text-zinc-300"> - {{ $submission->response_points }} pts</span>
                    @if($submission->submittion_date)
                        — {{ $submission->submittion_date->format('d/m/Y H:i') }}
                    @endif
                </div>

                <ul class="divide-y divide-zinc-800">
                    @foreach($submission->responses as $response)
                        <li class="py-6 first:pt-0 last:pb-0">
                            @if($response->category)
                                <span class="inline-block text-xs uppercase tracking-wide text-zinc-400 bg-zinc-800 border border-zinc-700 rounded px-2 py-0.5 mb-2">
                                    {{ $response->category->name }}
                                </span>
                            @endif
                            <p class="text-zinc-300 mb-1">
                                {{ $response->question?->order }}.
                                {{ $response->question?->question }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-zinc-200 font-semibold">
                                    {{ $response->response_text ?? '—' }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $response->points }} / {{ $response->question?->points }} pts
                                </span>
                                <span class="text-zinc-400">
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endif
