<?php

namespace App\Http\Resources\Api;

use App\Models\Driver;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'token' => $this->createToken('Moltaqa')->plainTextToken,
            'email' => $this->email,
            'name'  => $this->name,
            'lat' => $this->lat,
            'lng' => $this->long,
            'location' => $this->location,
            'is_authorized' => (bool) $this->is_authorized,
            'created_at'  => $this->created_at,
            'drivers'  => DriverResource::collection(Driver::nearestDrivers())
        ];
    }
}
