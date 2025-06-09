<?php

namespace App\Livewire;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use Livewire\Component;

class Battery1 extends Component
{
    //? Props
    public $company;
    public $batteries;
    public $battery;

    public function mount()
    {
        $companyService = app(CompanyService::class);
        $batteryService = app(BatteryService::class);

        $this->company = $companyService->getActive();
        $this->batteries = $batteryService->getAll();
        $this->battery = $batteryService->getBatteryById(1);
    }

    //? Reactive

    public $step = 'start';

    public $questions = [
        [
            'text' => '¿Te gusta planificar tu día con anticipación?',
            'name' => 'start-day-preference',
            'options' => [
                ['id' => 1, 'label' => 'Si'],
                ['id' => 2, 'label' => 'No'],
            ]
        ],

        [
            'text' => '¿Te sientes cómodo trabajando en equipo?',
            'name' => 'spare-time-preference',
            'options' => [
                ['id' => 3, 'label' => 'Si'],
                ['id' => 4, 'label' => 'No'],
            ]
        ],

        [
            'text' => '¿Prefieres ambientes tranquilos para concentrarte?',
            'name' => 'climate-preference',
            'options' => [
                ['id' => 5, 'label' => 'Si'],
                ['id' => 6, 'label' => 'No'],
            ]
        ],
    ];


    //? Methods

    public function startBattery()
    {
        $this->step = 'questions';
    }

    public function finishBattery()
    {
        $this->step = 'finished';
    }

    public function nextBattery()
    {
        return redirect()->route('batteries.second');
    }

    public function render()
    {
        /** @var \Livewire\WireableView $view */
        return view('livewire.battery-1')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
