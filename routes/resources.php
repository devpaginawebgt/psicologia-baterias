<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SubdivisionController;
use App\Http\Middleware\EmployeeTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::controller(SubdivisionController::class)
->middleware('throttle:30,1')
->prefix('/subdivisiones')
->as('subdivisions')
->group(function() {
    Route::get('', 'getByDivision')->name('index');
});

Route::get('/', function() {
    return redirect()->route('auth.index');
});

Route::middleware(EmployeeTokenIsValid::class)
->prefix('/material')
->as('materials.')
->where(['filename' => '[A-Za-z0-9 _.\-]+'])
->group(function () {
    Route::get('/{filename}', [MaterialController::class, 'show'])->name('show');
    Route::get('/{filename}/descargar', [MaterialController::class, 'download'])->name('download');
});
