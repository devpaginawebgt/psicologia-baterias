<?php

namespace App\Http\Services;

use App\Models\Battery;

class BatteryService {
    public function getAll() {
        return Battery::all();
    }
    
    public function getBatteryById(int $id) {
        return Battery::find($id);
    }

}

?>