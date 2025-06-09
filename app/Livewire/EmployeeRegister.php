<?php

namespace App\Livewire;

use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Services\DiseaseService;
use App\Http\Services\DivisionService;
use App\Http\Services\EmployeeService;
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
    public $form;

    public function mount()
    {
        $diseaseService  = app(DiseaseService::class);
        $divisionService = app(DivisionService::class);

        $this->genres          = EmployeeService::getGenres();
        $this->academicLevels  = EmployeeService::getAcademicLevels();
        $this->maritalStatuses = EmployeeService::getmaritalStatuses();
        $this->transportations = EmployeeService::getTransportations();
        $this->shifts          = EmployeeService::getshifts();
        $this->positions       = EmployeeService::getPositions();
        $this->booleans        = EmployeeService::getBooleans();
        $this->country         = 1;
        $this->diseases        = $diseaseService->getAll();
        $this->divisions       = $divisionService->getByCountry($this->country)->toArray();

        $this->form = [
            'name'               => '',
            'phone_number'       => '',
            'genre'              => 'Masculino',
            'academic_level'     => 'Primaria',
            'birthdate'          => '',
            'division_id'        => 1,
            'marital_status'     => 'Soltero',
            'children'           => null,
            'people_depending'   => null,
            'diseases'           => [],
            'transportation'     => 'Auto',
            'hiring_date'        => '',
            'shift'              => 'Matutino',
            'branch_number'      => '',
            'branch_address'     => '',
            'position'           => 'Dependiente',
            'sales_productivity' => null,
        ];

        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description']
            );
        }
    }

    //? ----------- Component variables and methods -----------
    public function register() {
        $request = new EmployeeRequest();

        Validator::make(
            ['form' => $this->form],
            $request->rules()
        )->validate();

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
