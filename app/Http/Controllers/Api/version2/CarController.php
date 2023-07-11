<?php

namespace App\Http\Controllers\Api\version2;

use App\Http\Controllers\Controller;
use App\Http\Resources\version2\CarResource;
use App\Models\Car;

class CarController extends Controller
{
    public function show($id)
    {
        $car = Car::find($id);
        return new CarResource($car);
    }
}
