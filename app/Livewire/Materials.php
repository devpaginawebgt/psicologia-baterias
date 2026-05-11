<?php

namespace App\Livewire;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Mary\Traits\Toast;

class Materials extends Component
{
    use Toast;

    //? Props
    #[Locked] public $employee;
    #[Locked] public $company;
    #[Locked] public $batteries;

    //? Reactive properties
    public $form;

    public function mount()
    {
        $employeeService = app(EmployeeService::class);
        $companyService  = app(CompanyService::class);
        $batteryService  = app(BatteryService::class);
        
        $this->employee  = $employeeService->getById(intval(session('employee_id')));
        $this->company   = $companyService->getActive();
        $this->batteries = $batteryService->getAll();

        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    public function render()
    {
        return view('livewire.materials')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
                'employee' => $this->employee
            ]);
    }
}
