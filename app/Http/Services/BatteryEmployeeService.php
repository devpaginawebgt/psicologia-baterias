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

    public function saveResponse(int $batteryId, array $data) {
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
                'battery_category_id' => $option->question->battery_category_id,
                'question_id'         => $questionId,
                'question_option_id'  => $option->id,
                'response_text'       => $option->option_text,
                'points'              => $option->points,
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

    public function hasRespondedTwice(int $employeeId, int $batteryId): bool
    {
        $batteryCounts = BatteryEmployee::where('employee_id', $employeeId)
            ->where('battery_id', $batteryId)
            ->count();

        return $batteryCounts >= 2;
    }

    public function hasRespondedAllTwice(int $employeeId): bool
    {
        $batteryCounts = BatteryEmployee::where('employee_id', $employeeId)
            ->selectRaw('battery_id, COUNT(*) as responses')
            ->groupBy('battery_id')
            ->pluck('responses', 'battery_id')
            ->toArray();

        $allBatteryIds = Battery::pluck('id')->toArray();

        foreach ($allBatteryIds as $batteryId) {
            if (!isset($batteryCounts[$batteryId]) || $batteryCounts[$batteryId] < 2) {
                return false;
            }
        }

        return true;
    }

    public function hasRespondedAll(int $employeeId): bool
    {
        $allBatteryIds = Battery::pluck('id')->toArray();

        $respondedBatteryIds = BatteryEmployee::where('employee_id', $employeeId)
            ->distinct()
            ->pluck('battery_id')
            ->toArray();

        return empty(array_diff($allBatteryIds, $respondedBatteryIds));
    }
}

?>