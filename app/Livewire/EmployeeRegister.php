<?php

namespace App\Livewire;

use App\Http\Services\CompanyService;
use App\Http\Services\CountryService;
use App\Http\Services\DiseaseService;
use App\Http\Services\DivisionService;
use App\Http\Services\EmployeeService;
use Livewire\Component;

class EmployeeRegister extends Component
{
    public $company;
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

    public function mount()
    {
        $employeeService = app(EmployeeService::class);
        $diseaseService = app(DiseaseService::class);
        $companyService = app(CompanyService::class);
        $divisionService = app(DivisionService::class);

        $this->company = $companyService->getActive();
        $this->genres = $employeeService->getGenres();
        $this->academicLevels = $employeeService->getAcademicLevels();
        $this->maritalStatuses = $employeeService->getmaritalStatuses();
        $this->transportations = $employeeService->getTransportations();
        $this->shifts = $employeeService->getshifts();
        $this->diseases = $diseaseService->getAll();
        $this->positions = $employeeService->getPositions();
        $this->booleans = $employeeService->getBooleans();
        $this->country = 1;
        $this->divisions = $divisionService->getByCountry($this->country)->toArray();
    }

    // Responses
    public $selectedDiseases = [];

    public function render()
    {
        return view('livewire.employee-register')
            ->layout('components.layouts.employee-auth-layout');
    }
}
