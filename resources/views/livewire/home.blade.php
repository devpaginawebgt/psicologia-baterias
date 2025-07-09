<main class="w-full p-4 flex justify-center">
    <x-mary-card
        title="Inicio"
        subtitle="¡Hola! Por favor, toma un tiempo para revisar el material que preparamos para ti"
        shadow
        separator
        class="relative w-full max-w-160 h-max text-sm bg-zinc-900"
    >
        <div class="flex flex-col gap-2">
            <x-reusable.pdf name="Carta Introductoria" filename="Carta Introductoria.pdf" />
            <x-reusable.pdf name="Reuniones vía Zoom" filename="Reuniones Zoom.pdf" />
            <x-reusable.pdf name="Consentimiento" filename="Consentimiento.pdf" />
            <x-reusable.pdf name="Ejercicios de Emociones para Casa" filename="Ejercicios de Emociones para Casa.pdf" />
            <x-reusable.pdf name="Ejercicios reducción de Estrés para casa" filename="Ejercicios reduccion Estres para casa.pdf" />
            
            <x-reusable.audio filename="AUDIO-2025-05-06.m4a" />
            <x-reusable.audio filename="AUDIO-2025-07-04.m4a" />
        </div>
    </x-mary-card>
</main>
