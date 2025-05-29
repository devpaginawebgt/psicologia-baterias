<?php

namespace App\Http\Controllers;

use App\Http\Services\DiseaseService;
use App\Http\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeAuthController extends Controller
{
    public function __construct(
        private readonly EmployeeService $employeeService,
        private readonly DiseaseService $diseaseService,
    ) {}

    public function index() {
        return view('pages/employee-login');
    }

    public function create() {
        $genres = $this->employeeService->getGenres();
        $academicLevels = $this->employeeService->getAcademicLevels();
        $maritalStatuses = $this->employeeService->getmaritalStatuses();
        $shifts = $this->employeeService->getshifts();
        $diseases = $this->diseaseService->getAll();

        return view('pages/employee-register', [
            'genres' => $genres,
            'academicLevels' => $academicLevels,
            'maritalStatuses' => $maritalStatuses,
            'shifts' => $shifts,
            'diseases' => $diseases,
        ]);
    }

    public function login() {

    }

    public function register(Request $request) {
        dd($request->all());
    }
}
