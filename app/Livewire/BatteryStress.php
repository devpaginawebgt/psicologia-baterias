<?php

namespace App\Livewire;

use App\Http\Requests\Batteries\BatterySelectRequest;
use App\Http\Resources\BatteryResource;
use App\Http\Services\BatteryEmployeeService;
use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Mary\Traits\Toast;

class BatteryStress extends Component
{
    use Toast;

    //? Props
    public $battery_id = 1;
    public $company;
    public $batteries;
    public $battery;
    public $questions;

    public $form = [];

    public function mount()
    {
        $companyService = app(CompanyService::class);
        $batteryService = app(BatteryService::class);

        // Set configurations
        $this->company = $companyService->getActive();
        $this->batteries = $batteryService->getAll();

        // Set battery and questions
        $dbBattery = $batteryService->getBatteryById($this->battery_id);
        $this->battery = (new BatteryResource($dbBattery))->toArray(request());
        $this->questions = $this->battery['questions'];

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
        $request = new BatterySelectRequest();

        Validator::make(
            ['form' => $this->form],
            $request->rules(),
            $request->messages()
        )->validate();

        $batteryEmployeeService = app(BatteryEmployeeService::class);
        $result = $batteryEmployeeService->saveSelectResponse($this->battery_id, $this->form);

        if (isset($result['error'])) {
            $this->error('Error', $result['error']);
            return;
        }

        $this->success('Guardado', $result['success']);

        $this->step = 'finished';
    } 

    public function nextBattery()
    {
        return redirect()->route('batteries.em-intelligence');
    }

    public function render()
    {
        return view('livewire.battery-stress')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
