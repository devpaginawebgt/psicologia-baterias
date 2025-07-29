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
    public $disableSubmit = false;
    public $form = [];

    public $informed_consent;
    public $completedSessions;
    public $responded;
    public $respondedTwice;
    public $disabledResponse;

    public $modalRespondedAll = false;
    public $modalRespondedAllTwice = false;
    public $disabledNext = false;

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

        // Set layout and view config
        $this->company = $companyService->getActive();
        $this->batteries = $batteryService->getAll();
        $this->questions = $this->battery['questions'];

        // Set user response config
        $this->informed_consent = boolval($this->employee->informed_consent);
        $this->responded = $batteryEmployeeService->getEmployeeResponse($this->battery['id']);
        $this->completedSessions = $employeeService->hasCompletedSessions($this->employee->id);
        $this->respondedTwice = $batteryEmployeeService->hasRespondedTwice($this->employee->id, $this->battery['id']);

        $this->disabledResponse = (
            !$this->informed_consent || 
            $this->responded && !$this->completedSessions || 
            $this->respondedTwice
        );

        // Set form keys
        foreach($this->questions as $question) {
            $this->form[$question['id']] = null;
        };

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

        $this->disableSubmit = true;

        $batteryEmployeeService = app(BatteryEmployeeService::class);
        $result = $batteryEmployeeService->saveResponse($this->battery['id'], $this->form);

        if (isset($result['error'])) {
            $this->error('Error', $result['error']);
            return;
        }

        $this->success('Guardado', $result['success']);

        $this->responded = true;

        $hasRespondedAllTwice = $batteryEmployeeService->hasRespondedAllTwice($this->employee->id);

        if ($hasRespondedAllTwice) {
            $this->modalRespondedAllTwice = true;
            $this->disabledNext = true;
            $this->step = 'finished';
            return;
        }

        $hasRespondedAll = $batteryEmployeeService->hasRespondedAll($this->employee->id);

        if ($hasRespondedAll && !$this->completedSessions) {
            $this->modalRespondedAll = true;
            $this->disabledNext = true;
            $this->step = 'finished';
            return;
        }

        $this->disableSubmit = false;

        $this->step = 'finished';
        return;
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
                'employee' => $this->employee
            ]);
    }
}
