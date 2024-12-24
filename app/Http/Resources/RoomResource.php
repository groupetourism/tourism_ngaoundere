<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'accommodation_id' => $this->accommodation_id,
            'room_number' => $this->room_number,
            'capacity' => $this->capacity,
            'price_per_night' => $this->price_per_night,
            'is_available' => $this->is_available,
            'image' => $this->image,
            'hotel' => new AccommodationResource($this->whenLoaded('hotel')),
            'reservations' => ReservationResource::collection($this->whenLoaded('reservations')),
        ];
    }
}
