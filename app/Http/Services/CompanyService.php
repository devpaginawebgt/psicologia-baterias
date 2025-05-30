<?php

namespace App\Http\Services;

use App\Models\Company;

class CompanyService {
    public function getActive() {
        return Company::where('is_active', true)->first();
    }
    
}

?>