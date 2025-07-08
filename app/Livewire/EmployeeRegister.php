<?php

namespace App\Livewire;

use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Services\DiseaseService;
use App\Http\Services\DivisionService;
use App\Http\Services\EmployeeService;
use App\Http\Services\SubdivisionService;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Mary\Traits\Toast;

class EmployeeRegister extends Component
{
    use Toast;

    //? ----------- Options and form configuration -----------
    public $genres;
    public $academicLevels;
    public $maritalStatuses;
    public $shifts;
    public $diseases;
    public $transportations;
    public $positions;
    public $booleans;
    public $country;
    public $divisions;
    public $subdivisions;
    public $form;

    public function mount()
    {
        $diseaseService  = app(DiseaseService::class);
        $divisionService = app(DivisionService::class);
        $subdivisionService = app(SubdivisionService::class);

        $this->genres          = EmployeeService::getGenres();
        $this->academicLevels  = EmployeeService::getAcademicLevels();
        $this->maritalStatuses = EmployeeService::getmaritalStatuses();
        $this->transportations = EmployeeService::getTransportations();
        $this->shifts          = EmployeeService::getshifts();
        $this->positions       = EmployeeService::getPositions();
        $this->booleans        = EmployeeService::getBooleans();
        $this->country         = 1;
        $this->diseases        = $diseaseService->getAll();
        $this->divisions       = $divisionService->getByCountry(1);
        $this->subdivisions    = $subdivisionService->getByDivision(1);

        $this->form = [
            'name'                  => '',
            'lastname'              => '',
            'phone_number'          => '',
            'genre'                 => 'Masculino',
            'academic_level'        => 'Primaria',
            'birthdate'             => '',
            'marital_status'        => 'Soltero',
            'children'              => null,
            'people_depending'      => null,
            'diseases'              => [],
            'transportation'        => 'Auto',
            'hiring_date'           => '',
            'branch_division_id'    => null,
            'branch_subdivision_id' => null,
            'position'              => 'Dependiente',
            'sales_productivity'    => null,
        ];

        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    //? ----------- Component variables and methods -----------

    public function register() {
        $this->resetErrorBag();
        $request = new EmployeeRequest();

        $validator = Validator::make(
            ['form' => $this->form],
            $request->rules(),
            $request->messages()
        );

        if ($validator->fails()) {
            $this->error('Error', 'Por favor llene todos los campos para registrarse.');

            foreach ($validator->errors()->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }

            return;
        }

        $employeeService = app(EmployeeService::class);
        $employeeService->create($this->form);

        session()->flash('toast', [
            'title'       => '¡Éxito!',
            'description' => 'Te has registrado correctamente.',
            'type'        => 'success',
        ]);

        return redirect()->route('auth.index');
    }

    //? ----------- Render Component -----------
    public function render()
    {
        return view('livewire.employee-register')
            ->layout('components.layouts.employee-auth-layout', [
                'title' => 'Registrarse'
            ]);
    }
}
