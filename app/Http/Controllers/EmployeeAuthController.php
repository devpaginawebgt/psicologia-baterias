<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Services\CompanyService;
use App\Http\Services\DiseaseService;
use App\Http\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeAuthController extends Controller
{
    public function __construct(
        private readonly EmployeeService $employeeService,
        private readonly DiseaseService $diseaseService,
        private readonly CompanyService $companyService,
    ) {}

    public function index() {
        return view('pages/employee-login');
    }

    public function create() {
        $company = $this->companyService->getActive();
        $genres = $this->employeeService->getGenres();
        $academicLevels = $this->employeeService->getAcademicLevels();
        $maritalStatuses = $this->employeeService->getmaritalStatuses();
        $shifts = $this->employeeService->getshifts();
        $diseases = $this->diseaseService->getAll();
        $booleans = $this->employeeService->getBooleans();

        return view('pages/employee-register', [
            'company' => $company,
            'genres' => $genres,
            'academicLevels' => $academicLevels,
            'maritalStatuses' => $maritalStatuses,
            'shifts' => $shifts,
            'diseases' => $diseases,
            'booleans' => $booleans,
        ]);
    }

    public function login() {

    }

    public function register(EmployeeRequest $request) {
        $employee = $this->employeeService->create($request);

        return redirect()->route('auth.index');
    }
}
