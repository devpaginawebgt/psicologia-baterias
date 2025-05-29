<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\EmployeeAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth')->group(function () {
    Route::controller(EmployeeAuthController::class)->group(function() {
        Route::get('ingresar', 'index')->name('.index');
        Route::get('registro', 'create')->name('.form');
        Route::post('inicio-sesion', 'login')->name('.login');
        Route::post('registrarse', 'register')->name('.register');
    });
});

// Route::post('logout', App\Livewire\Actions\Logout::class)
//     ->name('logout');
