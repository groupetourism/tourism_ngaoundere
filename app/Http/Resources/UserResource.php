<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'phone' => $this->phone,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
            'reservations' => EventResource::collection($this->whenLoaded('reservations')),
            'tours' => TourResource::collection($this->whenLoaded('tours')),
        ];
    }
}
