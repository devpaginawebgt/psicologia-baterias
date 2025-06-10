<?php

namespace App\Livewire;

use App\Http\Requests\Batteries\BatterySelectRequest;
use App\Http\Services\BatteryEmployeeService;
use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Mary\Traits\Toast;

class BatterySelect extends Component
{
    use Toast;

    //? Props
    public $company;
    public $batteries;
    public $battery;
    public $questions;
    public $response;

    public $form = [];

    public function mount(string $slug)
    {
        $batteryService = app(BatteryService::class);
        $this->battery = $batteryService->getBySlugResource($slug);

        // TODO: 404 batteries
        if (!$this->battery)
            dd('Error');

        $companyService = app(CompanyService::class);
        $batteryEmployeeService = app(BatteryEmployeeService::class);
        // Set configurations
        $this->company = $companyService->getActive();
        $this->batteries = $batteryService->getAll();
        $this->response = $batteryEmployeeService->getEmployeeResponse($this->battery['id']);
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
        $result = $batteryEmployeeService->saveResponse($this->battery['id'], $this->form);

        if (isset($result['error'])) {
            $this->error('Error', $result['error']);
            return;
        }

        $this->success('Guardado', $result['success']);

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
