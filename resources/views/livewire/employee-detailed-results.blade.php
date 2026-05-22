<main class="w-full p-4 flex justify-center">
    <x-mary-card
        shadow
        class="relative w-full max-w-3xl h-max text-sm bg-zinc-900"
    >
        <x-slot:title class="text-center">
            Respuestas detalladas
        </x-slot:title>

        <p class="text-sm text-zinc-400 text-center mb-4">
            {{ $employee->name }} {{ $employee->lastname }}
        </p>

        {{-- Mobile: select --}}
        <x-mary-select
            wire:model.live="selectedTab"
            :options="$batteries"
            option-label="name"
            option-value="id"
            class="sm:hidden mb-4"
        />

        {{-- Desktop: tabs --}}
        <x-mary-tabs
            wire:model="selectedTab"
            label-class="font-semibold pb-2"
            label-div-class="hidden sm:flex border-b-[length:var(--border)] border-b-base-content/10 overflow-x-auto"
        >
            @foreach($batteries as $battery)
                <x-mary-tab name="{{ $battery->id }}" label="{{ $battery->name }}">
                    <h2 class="text-lg font-semibold text-center mt-2 mb-4">
                        {{ $battery->name }}
                    </h2>

                    <x-results.detailed-results
                        :responses="$employeeBatteries->get($battery->id) ?? collect()"
                    />
                </x-mary-tab>
            @endforeach
        </x-mary-tabs>
    </x-mary-card>
</main>
