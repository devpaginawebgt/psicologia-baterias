<?php

use App\Http\Controllers\BatteryController;
use App\Http\Middleware\EmployeeTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::middleware(EmployeeTokenIsValid::class)
->controller(BatteryController::class)
->prefix('baterias')
->as('batteries')
->group(function() {
    Route::get('/bateria-1', 'first')->name('.first');
})

?>