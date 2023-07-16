<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Resources\v2\CarCollection;
use App\Http\Resources\v2\CarResource;
use App\Models\Car;

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

    public function show($id)
    {
        $car = Car::find($id);
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
