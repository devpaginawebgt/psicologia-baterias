<?php

use App\Http\Controllers\SubdivisionController;
use App\Http\Middleware\EmployeeTokenIsValid;
use Illuminate\Support\Facades\Route;

// Resources routes
require __DIR__.'/resources.php';

// Auth routes
require __DIR__.'/auth.php';

// Signed in routes
Route::middleware(EmployeeTokenIsValid::class)
->group(function() {
    require __DIR__.'/batteries.php';
}); 

// Fallback route
Route::fallback(function () {
    return redirect()->route('batteries.home');
});