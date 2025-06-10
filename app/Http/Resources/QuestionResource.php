<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'battery_id' => $this->battery_id,
            'question_type_id' => $this->question_type_id,
            'question_label' => $this->order . '. ' . $this->question,
            'question' => $this->question,
            'points' => $this->points,
            'order' => $this->order,
            'is_active' => $this->is_active,

            // Relationships
            'type' => $this->questionType->name,
            'options' => (new QuestionOptionCollection($this->options))->toArray($request)
        ];
    }
}
