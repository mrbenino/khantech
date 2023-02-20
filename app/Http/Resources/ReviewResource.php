<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'reviewer' => $this->reviewer,
          'email' => $this->email,
          'review' => $this->review,
          'rating' => $this->rating,
          'employee' => $this->employee,
          'employees_position' => $this->employees_position,
          'unique_employee_number' => $this->unique_employee_number,
          'company' => $this->company,
          'company_description' => $this->company_description,
        ];
    }
}
