<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Resources\v2\CarCollection;
use App\Http\Resources\v2\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return new CarCollection(Car::all());
    }

    public function getRandomCars()
    {
        return new CarCollection(Car::inRandomOrder()->take(8)->get());
    }

    public function show(Request $request)
    {
        $carId = $request->input('car_id');
        $car = Car::findOrFail($carId);
        return new CarResource($car);
    }

    public function store()
    {
    }


    public function  update()
    {
    }


    public function destroy()
    {
    }
}
