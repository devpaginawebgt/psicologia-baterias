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

        <div class="w-full flex flex-col items-center mt-8">
            <p class="w-full text-center mb-2">Soporte Técnico de Plataforma</p>
            <a
                href="https://wa.me/50234832086"
                target="_blank"
                class="flex justify-center items-center py-2 px-3 bg-green-700 rounded-md gap-2 text-sm hover:bg-green-600 hover:-translate-y-0.5 transition-all duration-300 ease-in-out"
            >
                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 256 258"><defs><linearGradient id="logosWhatsappIcon0" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1faf38"/><stop offset="100%" stop-color="#60d669"/></linearGradient><linearGradient id="logosWhatsappIcon1" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#f9f9f9"/><stop offset="100%" stop-color="#fff"/></linearGradient></defs><path fill="url(#logosWhatsappIcon0)" d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a123 123 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004"/><path fill="url(#logosWhatsappIcon1)" d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416m40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513z"/><path fill="#fff" d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561s11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716s-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64"/></svg></span>
                +502 3483-2086
            </a>
        </div>
    </x-mary-card>
</main>
