<main class="w-full p-4 flex justify-center">
    <x-mary-card
        title="Inicio"
        shadow
        separator
        class="relative w-full max-w-160 h-max text-sm bg-zinc-900"
    >
        <p class="mb-4">
            ¡Bienvenido! Antes de dar inicio, por favor toma un tiempo para leer el siguiente documento.
        </p>

        <div class="mb-6">
            <x-reusable.pdf name="Carta Introductoria" filename="Carta Introductoria.pdf" />
        </div>

        <p class="mb-4">
            Al terminar, lee el documento de consentimiento. Es un paso importante para continuar y tener acceso a las escalas.
        </p>

        <div class="mb-6">
            <x-reusable.pdf name="Consentimiento Informado" filename="Consentimiento Informado.pdf" />
        </div>

        <p class="mb-6">
            Por último, al hacer click en el botón <strong>Acepto participar</strong> confirmas haber leído y entendido el documento
            <a href="/materiales/Consentimiento.pdf" target="_blank" class="text-(--secondary-color)">
                Consentimiento Informado
            </a>
            y consientes participar en el presente proyecto.
        </p>

        <div class="w-full flex items-center">
            <x-mary-button
                wire:click="confirmConsent"
                class="btn-sm btn-soft w-max mx-auto btn-consent"
                :disabled="$informed_consent || $disableSubmit"
                spinner="confirmConsent"
            >
                Acepto participar
            </x-mary-button>
        </div>

        @if($informed_consent)
            <div class="w-full flex items-center mt-5">
                <x-mary-button
                    class="btn-sm btn-soft w-max mx-auto"
                    link="{{ '/baterias/' . $first_battery['url_type'] . '/' . $first_battery['url'] }}"
                >
                    Primera Escala
                </x-mary-button>
            </div>
        @endif
    </x-mary-card>
</main>
