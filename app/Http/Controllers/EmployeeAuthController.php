<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\EmployeeLoginRequest;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Services\EmployeeService;

class EmployeeAuthController extends Controller
{
    public function __construct(
        private readonly EmployeeService $employeeService,
    ) {}

    public function login(EmployeeLoginRequest $request) {
        $this->employeeService->login($request);
        
        return redirect()->route('batteries.first');
    }
}
