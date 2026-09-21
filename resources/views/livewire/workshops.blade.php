<main class="w-full p-4 flex justify-center">
    <x-mary-card
        title="Talleres"
        subtitle="Usuario: {{ $employee->name }} {{ $employee->lastname }}"
        shadow
        separator
        class="relative w-full max-w-160 h-max text-sm bg-zinc-900"
    >
        <p class="mb-4">
            Lee el siguiente documento sobre las instrucciones para asistir a los talleres.
        </p>

        <div class="mb-8">
            <x-reusable.pdf name="Reuniones vía Zoom" filename="Reuniones Zoom.pdf" />
        </div>

        <div class="mb-8">
            <x-mary-radio
                label="¿Ha asistido al taller de Taller Inteligencia Emocional y Social?"
                :options="$booleans"
                wire:model="form.emotional_social_session"
                option-label="label"
                option-value="value"
                inline
                {{-- :disabled="$completedSessions" --}}
                disabled
            />
        </div>

        <div class="mb-8">
            <x-mary-radio
                label="¿Ha asistido al taller de Taller Herramientas para Manejo de Emociones?"
                :options="$booleans"
                wire:model="form.emotional_management_session"
                option-label="label"
                option-value="value"
                inline
                {{-- :disabled="$completedSessions" --}}
                disabled
            />
        </div>

        <x-mary-button
            :disabled="$completedSessions || $disableSubmit"
            wire:click="updateSessions"
            class="btn-sm btn-soft w-max"
            spinner="updateSessions"
        >
            Guardar
        </x-mary-button>
    </x-mary-card>
</main>
