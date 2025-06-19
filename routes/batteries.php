<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatteryController;
use App\Http\Middleware\EmployeeTokenIsValid;
use App\Livewire\BatterySelect;
use App\Livewire\EmployeeConfig;

Route::middleware(EmployeeTokenIsValid::class)->prefix('baterias')->as('batteries')->group(function() {
    Route::controller(BatteryController::class)->group(function() {
        Route::get('salir', 'logout')->name('.logout');
    });
    
    // Select Batteries
    Route::get('configuraciones', EmployeeConfig::class)->name('.config');
    Route::get('seleccionable/{slug}', BatterySelect::class)->name('.select');
})

?>