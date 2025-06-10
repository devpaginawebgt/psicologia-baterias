<?php

namespace App\Http\Services;

use App\Models\Battery;
use App\Models\BatteryEmployee;
use App\Models\QuestionOption;
use App\Models\Response;
use Carbon\Carbon;

class BatteryEmployeeService {
    public function getEmployeeResponse(int $batteryId) {
        $employeeId = session('employee_id');
        
        return BatteryEmployee::where('battery_id', $batteryId)
            ->where('employee_id', $employeeId)
            ->exists();
    }

    public function saveSelectResponse(int $batteryId, array $data) {
        $employeeId = session('employee_id');
        $battery = Battery::find($batteryId);

        if (!$employeeId)
            return ['error' => 'Error en el usuario, inicie sesión de nuevo.'];

        if (!$battery)
            return ['error' => 'Error al cargar la escala.'];

        $responseOptions = [];
        $responsePoints = 0;

        foreach($data as $questionId => $optionId) {
            $option = QuestionOption::find($optionId);

            if ($option->question->id != $questionId)
                return ['error' => 'Error en las opciones de respuesta, contacte a Soporte.'];

            $responseOptions[] = [
                'question_id'        => $questionId,
                'question_option_id' => $option->id,
                'response_text'      => $option->option_text,
                'points'             => $option->points,
            ];

            $responsePoints += $option->points;
        }

        $points = $battery->questions->sum('points');

        $batteryEmployee = BatteryEmployee::create([
            'battery_id'      => $batteryId,
            'employee_id'     => $employeeId,
            'points'          => $points,
            'response_points' => $responsePoints,
            'submittion_date' => Carbon::now()
        ]);

        if ( !$batteryEmployee )
            return ['error' => 'Error al guardar respuesta de escala, contacte a Soporte.'];

        foreach($responseOptions as $response) {
            $response['battery_employee_id'] = $batteryEmployee->id;
            Response::create($response);
        }

        return ['success' => 'Respuesta guardada correctamente.'];
    }
}

?>