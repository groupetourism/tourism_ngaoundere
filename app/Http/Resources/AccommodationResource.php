<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccommodationResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'promoter' => $this->promoter,
            'number_of_stars' => $this->number_of_stars,
            'number_of_rooms' => $this->number_of_rooms,
            'number_of_beds' => $this->number_of_beds,
            'restaurant_capacity' => $this->restaurant_capacity,
            'bar_capacity' => $this->bar_capacity,
            'conference_room_capacity' => $this->conference_room_capacity,
            'capacity' => $this->capacity,
            'parking' => $this->parking,
            'is_public' => $this->is_public,
            'image' => $this->image,
            'contact_info' => $this->contact_info,
            'website' => $this->website,
            'rooms' => RoomResource::collection($this->whenLoaded('rooms')),
            'tours' => TourResource::collection($this->whenLoaded('tours')),
            'reservations' => ReservationResource::collection($this->whenLoaded('reservations')),
            'department' => DepartmentResource::collection($this->whenLoaded('department'))
        ];
    }
}
