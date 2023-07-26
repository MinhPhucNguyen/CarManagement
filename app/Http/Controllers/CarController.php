<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function show($carSlug, $id)
    {
        $car = Car::findOrFail($id);
        return view('client.car.car_detail', compact('car'));
    }
}
