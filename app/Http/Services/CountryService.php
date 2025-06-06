<?php

namespace App\Http\Services;

use App\Models\Country;

class CountryService {
    public function getAll() {
        return Country::all();
    }

}

?>