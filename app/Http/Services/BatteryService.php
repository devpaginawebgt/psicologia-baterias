<?php

namespace App\Http\Services;

use App\Http\Resources\BatteryResource;
use App\Models\Battery;

class BatteryService {
    public function getAll() {
        return Battery::orderBy('order')->get();
    }

    public function getBatteryById(int $id) {
        return Battery::find($id);
    }

    public function getFirst() {
        return Battery::where('order', 1)->first();
    }

    public function getBySlugResource(string $slug) {
        $battery = Battery::where('url', $slug)->first();

        if(!$battery)
            return null;

        return (new BatteryResource($battery))->toArray(request());
    }

    public function getNext(int $current) {
        $next = $current + 1;
        $battery = Battery::where('order', $next)->first();

        if (!$battery)
            return $this->getFirst();

        return $battery;
    }

    public function getBatteryResource(int $id) {
        return (new BatteryResource(Battery::find($id)))->toArray(request());
    }

    public function redirectTo($battery)
    {
        $type = data_get($battery, 'url_type');
        $slug = data_get($battery, 'url');

        $routeName = match ($type) {
            'seleccionable' => 'batteries.select',
            default => null,
        };

        if ($routeName === null) {
            abort(404);
        }

        return redirect()->route($routeName, ['slug' => $slug]);
    }
}
