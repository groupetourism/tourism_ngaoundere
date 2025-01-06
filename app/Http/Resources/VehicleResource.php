<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'department_id' => $this->department_id,
            'type' => $this->type,
            'license_plate' => $this->license_plate,
            'provider_name' => $this->provider_name,
            'description' => $this->description,
            'number_of_seats' => $this->number_of_seats,
            'price_per_hour' => $this->price_per_hour,
            'is_available' => $this->is_available,
            'image' => $this->image,
            'contact_info' => $this->contact_info,
            'website' => $this->website,
            'reservations' => EventResource::collection($this->whenLoaded('reservations')),
            'tours' => TourResource::collection($this->whenLoaded('tours')),
            'department' => DepartmentResource::collection($this->whenLoaded('department'))
        ];
    }
}
