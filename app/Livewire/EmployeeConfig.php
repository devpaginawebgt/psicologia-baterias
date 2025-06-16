<?php

namespace App\Livewire;

use App\Http\Requests\EmployeeConfigRequest;
use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Mary\Traits\Toast;

class EmployeeConfig extends Component
{
    use Toast;

    //? Props
    public $company;
    public $batteries;
    public $employee;
    public $booleans;

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
        $this->booleans  = $employeeService->getBooleans();

        $this->form = [
            'emotional_social_session' => $this->employee->emotional_social_session,
            'emotional_management_session' => $this->employee->emotional_management_session,
        ];

        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    public function updateSessions() {
        if (
            $this->form['emotional_social_session'] == $this->employee->emotional_social_session &&
            $this->form['emotional_management_session'] == $this->employee->emotional_management_session
        ) {
            $this->info('Información', 'No hay datos para actualizar');
            return;
        }

        $request = new EmployeeConfigRequest();

        Validator::make(
            ['form' => $this->form],
            $request->rules(),
            $request->messages()
        )->validate();

        $employeeService = app(EmployeeService::class);
        $result = $employeeService->updateSessions($this->employee->id, $this->form);

        if ($result['update'] == false) {
            $this->error('Error', 'No se actualizó la información, intente de nuevo.');
            return;
        }

        $this->employee = $result['employee'];
        $this->success('Éxito', 'Tu información se ha actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.employee-config')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
