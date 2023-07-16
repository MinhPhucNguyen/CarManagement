<?php

namespace App\Http\Resources\v2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'car_id' => $this->car_id,
            'carname' => $this->car_name . ' ' . $this->year,
            'yearofcar' => $this->year,
            'location' => $this->location,
            'number_of_trip' => $this->number_of_trip,
            'transmission' => $this->transmission,
            'price' => $this->price,
            'status' => $this->status,
            'car_images' => $this->carImages->map(function($image) {
                return $image->image;
            }),
        ];
    }
}
