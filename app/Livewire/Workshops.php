<?php

namespace App\Livewire;

use App\Http\Requests\Employee\EmployeeConfigRequest;
use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Mary\Traits\Toast;

class Workshops extends Component
{
    use Toast;

    //? Props
    public $company;
    public $batteries;
    public $employee;
    public $booleans;

    //? Reactive properties
    public $form;
    public $disableSubmit = false;
    public $completedSessions;

    public function mount()
    {
        $employeeService = app(EmployeeService::class);
        $companyService  = app(CompanyService::class);
        $batteryService  = app(BatteryService::class);
        
        $this->employee          = $employeeService->getById(intval(session('employee_id')));
        $this->completedSessions = $employeeService->hasCompletedSessions($this->employee->id);
        $this->company           = $companyService->getActive();
        $this->batteries         = $batteryService->getAll();
        $this->booleans          = $employeeService->getBooleans();

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

        $this->resetErrorBag();
        
        $request = new EmployeeConfigRequest();

        Validator::make(
            ['form' => $this->form],
            $request->rules(),
            $request->messages()
        )->validate();

        $this->disableSubmit = true;

        $employeeService = app(EmployeeService::class);
        $result = $employeeService->updateSessions($this->employee->id, $this->form);

        if ($result['update'] == false) {
            $this->error('Error', 'No se actualizó la información, intente de nuevo.');
            return;
        }

        $this->employee = $result['employee'];
        $this->completedSessions = $employeeService->hasCompletedSessions($this->employee->id);
        $this->success('Éxito', 'Tu información se ha actualizado correctamente.');

        $this->disableSubmit = false;
    }

    public function render()
    {
        return view('livewire.workshops')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
