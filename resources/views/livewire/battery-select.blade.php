<main class="w-full p-8 flex justify-center">
    <x-mary-card
        title="Escala de {{ $battery['name'] }}"
        subtitle="{{ $battery['description'] }}"
        shadow
        separator
        class="relative w-full max-w-160 h-max text-sm bg-zinc-900"
    >
        @if($response)
            <x-mary-badge
                value="Respondida"
                class="badge-success badge-soft absolute -top-3 left-1/2 -translate-x-1/2 sm:top-4 sm:-right-4 sm:left-auto sm:translate-x-0"
            />
        @endif
    
        @if ($step === 'start')
            <div>
                <p class="mb-4 text-gray-300">
                    {{ $battery['instructions'] }}
                </p>

                <x-mary-button
                    wire:click="startBattery"
                    class="btn-sm btn-soft"
                >
                    @if($response)
                        Retomar
                    @else
                        Comenzar    
                    @endif
                </x-mary-button>
            </div>

        @elseif ($step === 'questions')
            <div class="flex flex-col gap-6">
                @foreach($questions as $question)
                    @if($question['type'] === 'select')
                        <x-mary-radio
                            label="{{ $question['question'] }}"
                            :options="$question['options']"
                            wire:model="form.{{ $question['id'] }}"
                            option-label="option_text"
                            option-value="id"
                        />
                    @endif
                @endforeach

                <x-mary-button
                    wire:click="finishBattery"
                    class="btn-sm btn-soft mt-4 w-max"
                >
                    Finalizar
                </x-mary-button>
            </div>
             
        @elseif ($step === 'finished')
            <div>
                <p>{{ $battery['end_message'] }}</p>

                <x-mary-button wire:click="nextBattery" class="btn-sm btn-soft mt-4">
                    Siguiente Escala
                </x-mary-button>
            </div>
        @endif
    </x-mary-card>
</main>