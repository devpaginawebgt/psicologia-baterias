<?php

namespace App\Livewire;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use Livewire\Component;

class Battery3 extends Component
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
        $this->battery = $batteryService->getBatteryById(3);
    }

    //? Reactive

    public $step = 'start';

    public $questions = [
        [
            'text' => '¿Cómo prefieres comenzar tu día?',
            'name' => 'start-day-preference',
            'options' => [
                ['id' => 7, 'label' => 'Con una bebida caliente (café, té)'],
                ['id' => 8, 'label' => 'Revisando el celular o noticias'],
                ['id' => 9, 'label' => 'Haciendo alguna actividad física ligera'],
            ]
        ],

        [
            'text' => '¿Qué prefieres hacer en tu tiempo libre?',
            'name' => 'spare-time-preference',
            'options' => [
                ['id' => 10, 'label' => 'Estar en casa descansando'],
                ['id' => 11, 'label' => 'Salir a caminar o pasear'],
                ['id' => 12, 'label' => 'Hacer alguna actividad creativa'],
            ]
        ],

        [
            'text' => '¿Qué tipo de clima disfrutas más?',
            'name' => 'climate-preference',
            'options' => [
                ['id' => 13, 'label' => 'Soleado y cálido'],
                ['id' => 14, 'label' => 'Nublado o fresco'],
                ['id' => 15, 'label' => ' Lluvioso o con neblina'],
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
        redirect()->route('batteries.first');
    }

    public function render()
    {
        /** @var \Livewire\WireableView $view */
        return view('livewire.battery-3')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
