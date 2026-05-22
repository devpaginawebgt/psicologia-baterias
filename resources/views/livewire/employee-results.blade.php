<main class="w-full p-4 flex justify-center">
    @php
        $componentMap = [
            1 => 'results.stress-results',
            2 => 'results.emotional-results',
            3 => 'results.happiness-results',
            4 => 'results.social-results',
        ];
    @endphp

    <x-mary-card
        shadow
        class="relative w-full max-w-3xl h-max text-sm bg-zinc-900"
    >
        <x-slot:title class="text-center">
            Resultados
        </x-slot:title>

        {{-- Mobile: select --}}
        <x-mary-select
            wire:model.live="selectedTab"
            :options="$batteries"
            option-label="name"
            option-value="id"
            class="sm:hidden mb-4"
        />

        {{-- Desktop: tabs (en mobile mantenemos el wrapper para no perder el tab-content,
             pero ocultamos la franja de labels con label-div-class) --}}
        <x-mary-tabs
            wire:model="selectedTab"
            label-class="font-semibold pb-2"
            label-div-class="hidden sm:flex border-b-[length:var(--border)] border-b-base-content/10 overflow-x-auto"
        >
            @foreach($batteries as $battery)
                <x-mary-tab name="{{ $battery->id }}" label="{{ $battery->name }}">
                    @if(isset($componentMap[$battery->id]))
                        <x-dynamic-component
                            :component="$componentMap[$battery->id]"
                            :battery="$battery"
                            :responses="$employeeBatteries->get($battery->id) ?? collect()"
                            :employee="$employee"
                        />
                    @endif
                </x-mary-tab>
            @endforeach
        </x-mary-tabs>
    </x-mary-card>
</main>
