<main class="w-full p-4 flex justify-center">
    <x-mary-card
        title="Escala de {{ $battery['name'] }}"
        subtitle="{{ $battery['description'] }}"
        shadow
        separator
        class="relative w-full max-w-160 h-max text-sm bg-zinc-900"
    >
        @if($responded)
            <x-mary-badge
                value="Respondida"
                class="badge-success badge-soft absolute -top-3 left-1/2 -translate-x-1/2 sm:top-4 sm:-right-4 sm:left-auto sm:translate-x-0"
            />
        @endif
    
        @if ($step === 'start')
            <div>              
                @if (!$informed_consent)
                    <p class="mb-4 text-gray-300">
                        Debes leer el documento Consentimiento Informado y confirmar tu participación en el módulo 
                        <a href="{{ route('batteries.home') }}" class="text-(--secondary-color) font-semibold">
                            Inicio
                        </a>
                        para responder a las escalas.
                    </p>
                @elseif ($responded && !$completedSessions || $respondedTwice)
                    <p class="mb-4 text-gray-300">
                        Ya has respondido este cuestionario.
                    </p>

                    <x-mary-button
                        wire:click="nextBattery"
                        class="btn-sm btn-soft"
                        :disabled="$disabledNext"
                    >
                        Siguiente Escala
                    </x-mary-button>
                @else
                    <p class="mb-4 text-gray-300">
                        {{ $battery['instructions'] }}
                    </p>
                    
                    <x-mary-button
                        wire:click="startBattery"
                        class="btn-sm btn-soft"
                        :disabled="$disabledResponse"
                    >
                        @if($responded)
                            Retomar
                        @else
                            Comenzar    
                        @endif
                    </x-mary-button>
                @endif
            </div>

        @elseif ($step === 'questions')
            <div class="flex flex-col gap-6">
                @foreach($questions as $index => $question)
                    @if($question['type'] === 'select')
                        <x-mary-radio
                            label="{{ $index + 1 }}. {{ $question['question'] }}"
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
                @if ($respondedTwice)
                    ¡Has completado esta escala!
                @else
                    <p>{{ $battery['end_message'] }}</p>

                    <x-mary-button
                        wire:click="nextBattery"
                        class="btn-sm btn-soft mt-4"
                        :disabled="$disabledNext"
                    >
                        Siguiente Escala
                    </x-mary-button>
                @endif
            </div>
        @endif
    </x-mary-card>

    <x-mary-modal wire:model="modalRespondedAll" title="Completado" class="backdrop-blur">
        ¡Gracias por completar todos los cuestionarios! El siguiente paso es asistir a los talleres, 
        puedes encontrar más información en el módulo
        <a href="{{ route('batteries.workshops') }}" class="text-(--secondary-color) font-semibold">
            Talleres
        </a>.
    </x-mary-modal>

    <x-mary-modal wire:model="modalRespondedAllTwice" title="Completado" class="backdrop-blur">
        ¡Gracias por completar todos los cuestionarios! Pronto se te mostrarán tus resultados.
    </x-mary-modal>
</main>