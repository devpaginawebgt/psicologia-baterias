<?php

namespace App\Http\Services;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeService {
    public function create(EmployeeRequest $request) {
        // $data = $request->validated();
        $employee = Employee::create($request->all());

        return $employee;
    }

    public function getGenres() {
        return [
            [ 'label' => 'Masculino' ],
            [ 'label' => 'Femenino' ],
        ];
    }

    public function getAcademicLevels() {
        return [
            [ 'label' => 'Primaria' ],
            [ 'label' => 'Secundaria' ],
            [ 'label' => 'Preparatoria' ],
            [ 'label' => 'Universidad' ],
            [ 'label' => 'Posgrado' ],
        ];
    }

    public function getMaritalStatuses() {
        return [
            [ 'label' => 'Casado' ],
            [ 'label' => 'Divorciado' ],
            [ 'label' => 'Viudo' ],
            [ 'label' => 'Union libre' ],
        ];
    }
    
    public function getShifts() {
        return [
            [ 'label' => 'Matutino' ],
            [ 'label' => 'Vespertino' ],
            [ 'label' => 'Nocturno' ],
            [ 'label' => 'Mixto' ],
        ];
    }

    public function getBooleans() {
        return [
            [ 
                'label' => 'No',
                'value' => 0,
            ],
            [ 
                'label' => 'Sí',
                'value' => 1,
            ],
        ];
    }
}

?>