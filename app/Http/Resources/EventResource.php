<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'site_id' => $this->site_id,
            'name' => $this->name,
            'description' => $this->description,
            'ticket_price' => $this->ticket_price,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'image' => $this->image,
            'site' => new SiteResource($this->whenLoaded('site')),
            'department' => DepartmentResource::collection($this->whenLoaded('department'))
        ];
    }
}
