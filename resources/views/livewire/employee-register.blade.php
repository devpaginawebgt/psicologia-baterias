@php
    $birthdateConfig = [ 
        'dateFormat' => 'Y-m-d',
        'maxDate' => 'today',
    ];
    $hiringConfig    = [ 
        'plugins' => [ 
            [ 
                'monthSelectPlugin' => [ 
                    'dateFormat' => 'Y-m-01',
                    'theme' => 'dark',
                    'maxDate' => 'today',
                ] 
            ] 
        ],
        'maxDate' => 'today',
    ];
@endphp

<main class="bg-zinc-900 p-6 w-full sm:max-w-[28rem] lg:max-w-[40rem] flex flex-col rounded-sm">
    <h1 class="uppercase text-xl font-semibold text-center text-(--secondary-color) mb-2 font-mono">Formulario de registro</h1>

    <form
        class="w-full flex flex-col gap-2 lg:grid lg:grid-cols-2 lg:gap-x-4 lg:gap-y-4"
        wire:submit="register"
    >
        @csrf
        <div>
            <x-mary-input
                type="text"
                label="Nombre"
                placeholder="Fernando José"
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
                type="text"
                label="Apellido"
                placeholder="Hernández López"
                id="name"
                wire:model.defer="form.lastname"
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
        
        {{-- <div>
            <x-mary-select
                label="Lugar de nacimiento"
                :options="$divisions"
                option-label="name"
                option-value="id"
                wire:model="form.division_id"
                required
            />
        </div> --}}

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
                required
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

        {{-- <div>
            <x-mary-select
                label="Turno de trabajo"
                :options="$shifts"
                option-label="label"
                option-value="label"
                id="shift"
                wire:model="form.shift"
                required
            />
        </div> --}}

        <div>
            <x-mary-select
                label="Departamento de Sucursal"
                :options="$divisions"
                id="branch_division"
                wire:model="form.branch_division_id"
                class="division"
                required
            />
        </div>

        <div>
            <x-mary-select
                label="Municipio de Sucursal"
                :options="$subdivisions"
                id="branch_subdivision"
                wire:model="form.branch_subdivision_id"
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
                placeholder="20"
                id="sales_productivity"
                wire:model.defer="form.sales_productivity"
                required
                min="1"
                max="100"
                step="0.01"
                suffix="%"
                money
            />  
        </div>

        <p class="mt-2 col-span-2 text-sm text-gray-500 text-center">
            Al concluír el registro regresarás a la página de Inicio y podrás ingresar al sistema con tu número de teléfono.
        </p>

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
                :disabled="$disableSubmit"
                spinner="register"
            >
                Registrarse
            </x-mary-button>
        </div>
    </form>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const divisionSelect    = document.querySelector('[id$="form.branch_division_id"]');
        const subdivisionSelect = document.querySelector('[id$="form.branch_subdivision_id"]');

        divisionSelect.addEventListener('change', async function() {
            divisionSelect.setAttribute('disabled', true);
            subdivisionSelect.setAttribute('disabled', true);
            subdivisionSelect.innerHTML = '';
            const response = await fetch(`/subdivisiones?division=${divisionSelect.value}`);

            if (response.ok) {
                const { subdivisions } = await response.json();

                subdivisions.forEach(subdivision => {
                    const option = document.createElement('option');
                    option.value = subdivision.id;
                    option.textContent = subdivision.name;
                    subdivisionSelect.appendChild(option);
                });
            } else {
                alert('Error al obtener los municipios, contacte a Soporte.');
            }

            divisionSelect.removeAttribute('disabled');
            subdivisionSelect.removeAttribute('disabled');
        });
    });
</script>