<?php

namespace App\Http\Services;

use App\Models\Battery;

class BatteryService {
    public function getAll() {
        return Battery::all();
    }
    
    public function getBatteryById(int $id) {
        $battery = Battery::find($id);

        if (!$battery) 
            dd('Batería no encontrada');

        return $battery;
    }
}

?>