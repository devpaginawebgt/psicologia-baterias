<main class="w-full p-8 flex justify-center">
    <x-mary-card
        title="{{ $battery->name }}"
        subtitle="{{ $battery->description }}"
        shadow
        separator
        class="w-full max-w-160 h-max text-sm"
    >
        @if ($step === 'start')
            <div>
                <p class="mb-4 text-gray-300">
                    Haz click en comenzar para responder al cuestionario.
                </p>

                <x-mary-button wire:click="startBattery" class="btn-sm btn-soft">
                    Comenzar
                </x-mary-button>
            </div>

        @elseif ($step === 'questions')
            <div class="flex flex-col gap-6">
                @for($i = 0; $i < 8; $i++)
                    @foreach($questions as $question)
                        <div>
                            <x-mary-radio
                                label="{{ $question['text'] }}"
                                :options="$question['options']"
                                wire:model="{{ $question['name'] . $i }}"
                                option-label="label"
                                name="start-day"
                                required
                            />
                        </div>
                    @endforeach
                @endfor

                <x-mary-button
                    wire:click="finishBattery"
                    class="btn-sm btn-soft mt-4 w-max"
                >
                    Finalizar
                </x-mary-button>
            </div>
             
        @elseif ($step === 'finished')
            <div>
                <p>¡Gracias por completar el cuestionario!</p>

                <x-mary-button wire:click="nextBattery" class="btn-sm btn-soft mt-4">
                    Siguiente batería
                </x-mary-button>
            </div>
        @endif
    </x-mary-card>
</main>