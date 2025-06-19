<?php

namespace App\Livewire;

use App\Http\Requests\Batteries\BatterySelectRequest;
use App\Http\Services\BatteryEmployeeService;
use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Mary\Traits\Toast;

class BatterySelect extends Component
{
    use Toast;

    //? Props
    public $employee;
    public $company;
    public $batteries;
    public $battery;
    public $questions;

    //? Props
    public $responded;
    public $disabledResponse;
    public $form = [];

    public function mount(string $slug)
    {
        $employeeService = app(EmployeeService::class);
        $batteryService = app(BatteryService::class);

        $this->employee  = $employeeService->getById(intval(session('employee_id')));
        $this->battery = $batteryService->getBySlugResource($slug);

        // TODO: 404 batteries
        if (!$this->battery) {
            $firstBattery = $batteryService->getFirst();
            return redirect("/baterias/{$firstBattery['url_type']}/{$firstBattery['url']}");
        }

        $companyService = app(CompanyService::class);
        $batteryEmployeeService = app(BatteryEmployeeService::class);

        // Set configurations
        $this->company = $companyService->getActive();
        $this->batteries = $batteryService->getAll();
        $this->responded = $batteryEmployeeService->getEmployeeResponse($this->battery['id']);
        $this->questions = $this->battery['questions'];

        // Set form keys
        foreach($this->questions as $question) {
            $this->form[$question['id']] = null;
        };

        $session1 = $this->employee->emotional_social_session;
        $session2 = $this->employee->emotional_management_session;
        $this->disabledResponse = $this->responded && (!$session1 || !$session2);

        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    //? Dynamic props
    public $step = 'start';

    public function startBattery()
    {
        $this->step = 'questions';
    }

    public function finishBattery()
    {
        $this->resetErrorBag();
        
        $request = new BatterySelectRequest();

        $validator = Validator::make(
            ['form' => $this->form],
            $request->rules(),
            $request->messages()
        );

        if ($validator->fails()) {
            $this->error('Error', 'Por favor responda a todas las preguntas del cuestionario.');

            foreach ($validator->errors()->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }

            return;
        }

        $batteryEmployeeService = app(BatteryEmployeeService::class);
        $result = $batteryEmployeeService->saveResponse($this->battery['id'], $this->form);

        if (isset($result['error'])) {
            $this->error('Error', $result['error']);
            return;
        }

        $this->success('Guardado', $result['success']);

        $this->responded = true;
        $this->step = 'finished';
    } 

    public function nextBattery()
    {
        $batteryService = app(BatteryService::class);
        $battery = $batteryService->getNext($this->battery['order']);

        return redirect("/baterias/{$battery['url_type']}/{$battery['url']}");
    }

    public function render()
    {
        return view('livewire.battery-select')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
