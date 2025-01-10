<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'visite_periode' => $this->visite_periode,
            'access_means' => $this->access_means,
            'offered_service' => $this->offered_service,
            'cultural_info' => $this->cultural_info,
//            'opening_hours' => $this->opening_hours,
            'ticket_price' => $this->ticket_price,
            'image' => $this->image,
            'contact_info' => $this->contact_info,
            'website' => $this->website,
            'events' => EventResource::collection($this->whenLoaded('events')),
            'tours' => TourResource::collection($this->whenLoaded('tours')),
            'department' => new DepartmentResource($this->whenLoaded('department'))
        ];
    }
}
