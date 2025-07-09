<?php

use App\Http\Controllers\SubdivisionController;
use Illuminate\Support\Facades\Route;

Route::controller(SubdivisionController::class)
->prefix('/subdivisiones')
->as('subdivisions')
->group(function() {
    Route::get('', 'getByDivision')->name('index');
});

Route::get('/', function() {
    return redirect()->route('auth.index');
});

Route::get('/descargar-material/{filename}', function ($filename) {
    $filePath = public_path('materiales/' . $filename);

    if (file_exists($filePath)) {
        return response()->download($filePath);
    }

    abort(404);
});

?>