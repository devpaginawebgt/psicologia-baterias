<?php

namespace App\Http\Controllers;

use App\Http\Services\SubdivisionService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubdivisionController extends Controller
{
    public function __construct(
        private SubdivisionService $subdivisionService
    ) {}

    public function getByDivision(Request $request)
    {        
        $division_id = (int)$request->input('division');

        if (!$division_id)
            return response()->json(['error' => 'No se encontró el departamento'], 422);

        $subdivisions = $this->subdivisionService->getByDivision($division_id);

        return response()->json([
            'subdivisions' => $subdivisions
        ]);   
    }
}
