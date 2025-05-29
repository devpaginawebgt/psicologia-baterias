<?php

namespace App\Http\Services;

class EmployeeService {
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
}

?>