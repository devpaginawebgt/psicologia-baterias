<x-layouts.employee-auth-layout>
    <main class="bg-zinc-900 p-6 w-full sm:max-w-[28rem] lg:max-w-[40rem] flex flex-col rounded-sm">
        <h1 class="uppercase text-xl font-semibold text-center text-(--secondary-color) mb-2">Formulario de registro</h1>

        <form
            class="w-full flex flex-col gap-2 lg:grid lg:grid-cols-2 lg:gap-x-4 lg:gap-y-4"
            action="{{ route('auth.register') }}"
            method="POST"
        >
            @csrf
            <input
                type="hidden"
                id="company_id"
                name="company_id"
                value="{{ $company->id }}"
            />  

            <div>
                <x-mary-input
                    type="text"
                    label="Nombre y Apellidos"
                    placeholder="José Hernández López"
                    id="name"
                    name="name"
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
                    id="phone"
                    name="phone_number"
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
                    name="genre"
                    required
                />
            </div>

            <div>
                <x-mary-select
                    label="Nivel Académico"
                    :options="$academicLevels"
                    option-label="label"
                    option-value="label"
                    name="academic_level"
                    required
                />
            </div>

            <div>
                <x-mary-datepicker
                    label="Fecha de nacimiento"
                    icon="o-calendar"
                    name="birthday"
                    id="birthday"
                    required
                />
            </div>

            <div>
                <x-mary-input
                    type="text"
                    label="Lugar de nacimiento"
                    placeholder="Ciudad de Guatemala"
                    id="birthplace"
                    name="birthplace"
                    required
                    maxlength="75"
                />  
            </div>

            <div>
                <x-mary-select
                    label="Estado Civil"
                    :options="$maritalStatuses"
                    option-label="label"
                    option-value="label"
                    name="marital_status"
                    required
                />
            </div>

            <div>
                <x-mary-input
                    type="number"
                    label="No. de Hijos"
                    placeholder="0"
                    id="children"
                    name="children"
                    required
                    max="50"
                />  
            </div>

            <div>
                <x-mary-input
                    type="number"
                    label="Personas que dependen de mí"
                    placeholder="0"
                    id="people_depending"
                    name="people_depending"
                    required
                    max="50"
                />  
            </div>

            <div>
                <x-mary-select
                    label="Enfermedad Crónica"
                    :options="$diseases"
                    option-label="name"
                    option-value="id"
                    id="diseases"
                    name="diseases"
                />
            </div>

            <div>
                <x-mary-select
                    label="Se traslada a su trabajo en"
                    :options="$booleans"
                    option-label="label"
                    option-value="value"
                    id="diseases"
                    name="uses_transportation"
                    required
                />
            </div>

            <div>
                <x-mary-datepicker
                    label="Fecha de ingreso a la empresa"
                    icon="o-calendar"
                    name="hiring_date"
                    id="hiring_date"
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
                    name="shift"
                    required
                />
            </div>

            <div>
                <x-mary-input
                    type="number"
                    label="No. de Sucursal"
                    placeholder="120"
                    id="branch_number"
                    name="branch_number"
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
                    name="branch_address"
                    maxlength="75"
                    required
                />  
            </div>

            <div>
                <x-mary-input
                    type="text"
                    label="Cargo"
                    placeholder="Dependiente"
                    id="position"
                    name="position"
                    maxlength="60"
                    required
                />  
            </div>

            <div class="col-span-2 w-full flex justify-between items-center">
                <a
                    href="{{ route('auth.index') }}"
                    class="text-sm hover:text-white text-(--secondary-color)" 
                >
                    Ya estoy registrado
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
</x-layouts.employee-auth-layout>