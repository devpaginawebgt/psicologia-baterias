<?php

namespace App\Http\Services;

use App\Models\Subdivision;

class SubdivisionService {
    public function getByDivision(int $id)
    {
        return Subdivision::where('division_id', $id)->get();
    }
}
