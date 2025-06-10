<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BatteryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url-type' => $this->url_type,
            'url' => $this->url,
            'description' => $this->description,
            'instructions' => $this->instructions,
            'end_message' => $this->end_message,
            'order' => $this->order,
            'questions' => (new QuestionCollection($this->questions))->toArray($request)
        ];
    }
}
