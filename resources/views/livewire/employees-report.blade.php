<main class="w-full p-4 lg:px-8 lg:py-5">
    <div class="w-full">
        <div class="flex flex-col gap-4 mb-6 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-3">
                <x-mary-icon name="o-users" class="w-8 h-8 lg:w-10 lg:h-10" />
                <h1 class="text-lg lg:text-2xl font-semibold uppercase">
                    Reporte de Empleados Registrados
                </h1>
            </div>

            <a
                href="{{ $exportUrl }}"
                wire:navigate.hover.false
                class="btn btn-success text-white"
            >
                <x-mary-icon name="o-arrow-down-tray" class="w-4 h-4" />
                Descargar Excel
            </a>
        </div>

        <div class="mb-4 max-w-md">
            <x-mary-input
                wire:model.live.debounce.400ms="search"
                placeholder="Buscar por nombre, teléfono, puesto o compañía..."
                icon="o-magnifying-glass"
                clearable
            />
        </div>

        <div class="overflow-x-auto">
            <x-mary-table
                :headers="$headers"
                :rows="$rows->toArray()"
                striped
                class="whitespace-nowrap"
            >
                @scope('cell_batteries_count', $row)
                    <span class="badge badge-soft badge-info">
                        {{ $row['batteries_count'] }}
                    </span>
                @endscope
            </x-mary-table>
        </div>

        <div class="mt-4">
            {{ $paginator->onEachSide(1)->links() }}
        </div>
    </div>
</main>
