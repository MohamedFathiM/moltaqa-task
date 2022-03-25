<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'  => $this->id,
            'joined_date' => $this->joined_date,
            'lat' => $this->current_latitude,
            'lng' => $this->current_longitude,
            'location' => $this->location
        ];
    }
}
