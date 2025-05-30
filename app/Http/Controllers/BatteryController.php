<?php

namespace App\Http\Controllers;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use App\Models\Battery;
use Illuminate\Http\Request;

class BatteryController extends Controller
{
    public function __construct(
        private readonly EmployeeService $employeeService,
    ) {}

    public function logout() {
        $this->employeeService->logout();

        return redirect()->route('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Battery $battery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Battery $battery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Battery $battery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Battery $battery)
    {
        //
    }
}
