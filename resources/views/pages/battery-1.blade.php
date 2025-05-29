<x-layouts.batteries-layout :company="$company" :batteries="$batteries">
    <main class="w-full p-8 flex justify-center">
        <x-mary-card
            title="{{ $battery->name }}"
            subtitle="{{ $battery->description }}"
            shadow
            separator
            class="w-full max-w-160 h-max text-sm"
        >
            <p class="mb-4">Haz click en comenzar para responder al cuestionario.</p>

            <x-mary-button class="btn-sm btn-soft">
                Comenzar
            </x-mary-button>
        </x-mary-card>
    </main>
</x-layouts.batteries-layout>