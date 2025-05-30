<?php

namespace App\Http\Services;

use App\Models\Disease;

class DiseaseService {
    public function getAll() {
        return Disease::all();
    }
    
}

?>