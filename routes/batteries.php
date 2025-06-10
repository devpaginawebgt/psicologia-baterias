<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatteryController;
use App\Http\Middleware\EmployeeTokenIsValid;
use App\Livewire\Battery1;
use App\Livewire\Battery2;
use App\Livewire\Battery3;
use App\Livewire\BatteryEmotionalIntelligence;
use App\Livewire\BatteryHappiness;
use App\Livewire\BatteryStress;

Route::middleware(EmployeeTokenIsValid::class)->prefix('baterias')->as('batteries')->group(function() {
    Route::controller(BatteryController::class)->group(function() {
        Route::get('salir', 'logout')->name('.logout');
    });
    
    Route::get('estres-percibido', BatteryStress::class)->name('.stress');
    Route::get('inteligencia-emocional', BatteryEmotionalIntelligence::class)->name('.em-intelligence');
    Route::get('felicidad', BatteryHappiness::class)->name('.happiness');
})

?>