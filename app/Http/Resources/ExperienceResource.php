<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
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
            'user_id' => $this->user_id,
            'job_title' => $this->job_title,
            'company_name' => $this->company_name,
            'country' => $this->country,
            'city' => $this->city,
            'start_month' => $this->start_month,
            'start_year' => $this->start_year,
            'end_month' => $this->end_month,
            'end_year' => $this->end_year,
            'is_current_job' => (bool) $this->current_job,
            'description' => $this->description,
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
