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
            'carId' => $this->car_id,
            'brand' => $this->brand->brand_name,
            'carOriginalName' => $this->car_name,
            'carCustomName' => $this->brand->brand_name . ' '. $this->car_name . ' ' . $this->year,
            'yearOfCar' => $this->year,
            'location' => $this->location,
            'desc' => $this->description,
            'numberOfTrip' => $this->number_of_trip,
            'transmission' => $this->transmission,
            'fuel' => $this->fuel,
            'seat' => $this->seats,
            'fuelConsumption' => $this->fuel_consumption,
            'price' => $this->price,
            'status' => $this->status,
            'delivery_enable' => $this->delivery_enable,
            'carImages' => $this->carImages->map(function($image) {
                return [
                    'imageId' => $image->image_id,
                    'imagePath' => $image->image,
                    'carId' => $image->car_id,
                ];
            }),
        ];
    }
}
