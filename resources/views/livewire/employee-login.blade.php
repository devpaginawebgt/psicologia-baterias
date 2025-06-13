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
                class="w-full bg-(--primary-color) mb-5"
            >
                Ingresar
            </x-mary-button>
    
            <a
                href="{{ route('auth.form') }}"
                class="text-sm mx-auto hover:text-white text-(--secondary-color)" 
            >
                Registrarse
            </a>
        </form>
    </main>
</div>