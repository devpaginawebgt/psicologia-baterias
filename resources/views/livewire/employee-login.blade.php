<div class="flex flex-col md:flex-row gap-2 lg:gap-8 items-center">
    <div>
        <img
            src="/logos/logo-psicolasa.png"
            alt=""
            class="w-full max-w-40 lg:max-w-72 object-contain"
        >
    </div>

    <main class="bg-zinc-900 p-8 w-full max-w-80 rounded-sm flex">
        <form
            class="w-full flex flex-col "
            wire:submit='login'
        >
            @csrf
            <h1 class="uppercase text-xl font-semibold text-center text-(--secondary-color) font-mono">Ingreso</h1>
        
            <div class="mb-2">
                <x-mary-input
                    type="number"
                    label="Teléfono"
                    placeholder="Ingresa tu teléfono"
                    id="phone"
                    wire:model.defer="form.phone_number"
                    prefix="+502"
                    class="hide-input-arrows"
                    required
                />  
            </div>
    
            <x-mary-button
                type="submit"
                class="w-full bg-(--primary-color) mb-4"
                :disabled="$disableSubmit"
                spinner="login"
            >
                Ingresar
            </x-mary-button>

            <div class="flex flex-col gap-1 text-sm text-center">
                <p class="text-gray-500">
                    Soporte Técnico de plataforma
                </p>

                <a
                    href="https://wa.me/50234832086"
                    target="_blank"
                    class="text-gray-300 hover:text-white transition-all duration-300 ease-in-out"
                >
                    Whatsapp +502 3483-2086
                </a>
            </div>

            {{-- <p class="text-sm text-gray-400 text-center">
                Si estás accediendo por primera vez, deberás
                <a
                    href="{{ route('auth.form') }}"
                    class="hover:text-white text-(--secondary-color) transition-all duration-200 ease-in-out"
                >
                registrarte
                </a>.
            </p> --}}

        </form>
    </main>
</div>