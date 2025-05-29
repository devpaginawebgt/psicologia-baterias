<x-layouts.employee-auth-layout>
    <main class="bg-zinc-900 p-4 w-full max-w-80 flex flex-col rounded-sm">
        <h1 class="uppercase text-xl font-semibold text-center text-(--secondary-color)">Ingreso</h1>
    
        <div class="mb-2">
            <x-mary-input
                type="number"
                label="Teléfono"
                wire:model="phoneNumber"
                placeholder="Ingresa tu teléfono"
                id="phone"
                name="phone"
                prefix="+502"
                class="hide-input-arrows"
            />  
        </div>

        <x-mary-button
            type="submit"
            class="w-full bg-(--primary-color) mb-5"
        >
            Ingresar
        </x-mary-button>

        <a
            href="{{ route('auth.register') }}"
            class="text-sm mx-auto hover:text-white text-(--secondary-color)" 
        >
            Registrarse
        </a>
    </main>
</x-layouts.employee-auth-layout>