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
            'type' => $this->type,
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'price_per_day' => $this->price_per_day,
            'number_of_stars' => $this->number_of_stars,
            'number_of_parlors' => $this->number_of_parlors,
            'number_of_rooms' => $this->number_of_rooms,
            'number_of_kitchens' => $this->number_of_kitchens,
            'number_of_bathroom' => $this->number_of_bathroom,
            'number_of_shower' => $this->number_of_shower,
            'balcony' => $this->balcony,
            'parking' => $this->parking,
            'is_available' => $this->is_available,
            'image' => $this->image,
            'contact_info' => $this->contact_info,
            'website' => $this->website,
            'rooms' => RoomResource::collection($this->whenLoaded('rooms')),
            'tours' => TourResource::collection($this->whenLoaded('tours')),
            'reservations' => ReservationResource::collection($this->whenLoaded('reservations')),

        ];
    }
}
