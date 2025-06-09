<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatteryController;
use App\Http\Middleware\EmployeeTokenIsValid;
use App\Livewire\Battery1;
use App\Livewire\Battery2;
use App\Livewire\Battery3;

Route::middleware(EmployeeTokenIsValid::class)->prefix('baterias')->as('batteries')->group(function() {
    Route::controller(BatteryController::class)->group(function() {
        Route::get('salir', 'logout')->name('.logout');
    });
    
    Route::get('bateria-1', Battery1::class)->name('.first');
    Route::get('bateria-2', Battery2::class)->name('.second');
    Route::get('bateria-3', Battery3::class)->name('.third');
})

?>