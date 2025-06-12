@php
    $birthdateConfig = [ 'dateFormat' => 'Y-m-d' ];
    $hiringConfig    = [ 
        'plugins' => [ 
            [ 
                'monthSelectPlugin' => [ 
                    'dateFormat' => 'Y-m-01',
                    'theme' => 'dark'
                ] 
            ] 
        ] 
    ];
@endphp

<main class="bg-zinc-900 p-6 w-full sm:max-w-[28rem] lg:max-w-[40rem] flex flex-col rounded-sm">
    <h1 class="uppercase text-xl font-semibold text-center text-(--secondary-color) mb-2">Formulario de registro</h1>

    <form
        class="w-full flex flex-col gap-2 lg:grid lg:grid-cols-2 lg:gap-x-4 lg:gap-y-4"
        wire:submit="register"
    >
        @csrf
        <div class="col-span-2">
            <x-mary-input
                type="text"
                label="Nombre y Apellidos"
                placeholder="José Hernández López"
                id="name"
                wire:model.defer="form.name"
                icon="o-user"
                class="w-full"
                autocomplete
                required
                maxlength="65"
            />  
        </div>

        <div>
            <x-mary-input
                type="number"
                label="Teléfono"
                placeholder="Ingresa tu teléfono"
                id="phone_number"
                wire:model.defer="form.phone_number"
                prefix="+502"
                class="w-full"
                class="hide-input-arrows"
                autocomplete
                required
            />  
        </div>

        <div>
            <x-mary-select
                label="Género"
                :options="$genres"
                option-label="label"
                option-value="label"
                wire:model="form.genre"
                id="gender"
                required
            />
        </div>

        <div>
            <x-mary-datepicker
                label="Fecha de nacimiento"
                icon="o-calendar"
                wire:model="form.birthdate"
                id="birthdate"
                placeholder="Seleccionar"
                id="birthdate"
                required
                :config="$birthdateConfig"
            />
        </div>
        
        <div>
            <x-mary-select
                label="Lugar de nacimiento"
                :options="$divisions"
                option-label="name"
                option-value="id"
                wire:model="form.division_id"
                required
            />
        </div>

        <div>
            <x-mary-select
                label="Estado Civil"
                :options="$maritalStatuses"
                option-label="label"
                option-value="label"
                wire:model="form.marital_status"
                required
            />
        </div>
        <div>
            <x-mary-select
                label="Nivel Académico"
                :options="$academicLevels"
                option-label="label"
                option-value="label"
                wire:model="form.academic_level"
                required
            />
        </div>
        
        <div>
            <x-mary-input
                type="number"
                label="Personas que dependen de mí"
                placeholder="0"
                id="people_depending"
                wire:model.defer="form.people_depending"
                required
                max="50"
            />  
        </div>

        <div>
            <x-mary-input
                type="number"
                label="No. de Hijos"
                placeholder="0"
                id="children"
                wire:model.defer="form.children"
                required
                max="50"
            />  
        </div>

        <div>
            <x-mary-choices
                label="Enfermedad Crónica"
                :options="$diseases"
                wire:model="form.diseases"
                option-label="name"
                option-value="id"
                height="max-h-64"
                clearable
                compact
                compact-text="seleccionadas"
            />
        </div>

        <div>
            <x-mary-select
                label="Se traslada a su trabajo en"
                :options="$transportations"
                option-label="label"
                option-value="value"
                id="diseases"
                wire:model="form.transportation"
                required
            />
        </div>

        <div>
            <x-mary-datepicker
                label="Fecha de ingreso a la empresa"
                icon="o-calendar"
                wire:model="form.hiring_date"
                id="hiring_date"
                placeholder="Seleccionar"
                :config="$hiringConfig"
                required
            />
        </div>

        <div>
            <x-mary-select
                label="Turno de trabajo"
                :options="$shifts"
                option-label="label"
                option-value="label"
                id="shift"
                wire:model="form.shift"
                required
            />
        </div>

        <div>
            <x-mary-input
                type="number"
                label="No. de Sucursal"
                placeholder="120"
                id="branch_number"
                wire:model.defer="form.branch_number"
                required
                max="9999"
            />  
        </div>

        <div>
            <x-mary-input
                type="text"
                label="Dirección de Sucursal"
                placeholder="Calle 8 No. 9"
                id="branch_address"
                wire:model.defer="form.branch_address"
                maxlength="75"
                required
            />  
        </div>

        <div>
            <x-mary-select
                label="Cargo"
                :options="$positions"
                option-label="label"
                option-value="label"
                id="position"
                wire:model="form.position"
                required
            />
        </div>

        <div>
            <x-mary-input
                type="number"
                label="Productividad"
                placeholder="500.00"
                id="sales_productivity"
                wire:model.defer="form.sales_productivity"
                required
                min="1"
                step="0.01"
                prefix="Q"
                money

            />  
        </div>

        <div class="col-span-2 w-full flex justify-between items-center">
            <a
                href="{{ route('auth.index') }}"
                class="text-sm hover:text-white text-(--secondary-color)" 
            >
                Ya estoy registrado(a)
            </a>

            <x-mary-button
                type="submit"
                class="bg-(--primary-color)"
            >
                Registrarse
            </x-mary-button>
        </div>
    </form>
</main>