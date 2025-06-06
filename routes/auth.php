<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\EmployeeAuthController;
use App\Livewire\EmployeeLogin;
use App\Livewire\EmployeeRegister;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth')->group(function () {
    Route::controller(EmployeeAuthController::class)->group(function() {
        Route::post('inicio-sesion', 'login')->name('.login');
        Route::post('registrarse', 'register')->name('.register');
    });
    
    Route::get('ingresar', EmployeeLogin::class)->name('.index');
    Route::get('registro', EmployeeRegister::class)->name('.form');
});

// Route::post('logout', App\Livewire\Actions\Logout::class)
//     ->name('logout');
