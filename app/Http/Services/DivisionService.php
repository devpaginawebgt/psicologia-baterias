<?php

namespace App\Http\Services;

use App\Models\Division;

class DivisionService {
    public function getByCountry(int $id) {
        return Division::where('country_id', $id)->get();
    }

}

?>