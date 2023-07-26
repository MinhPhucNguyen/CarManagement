<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function show(int $car){
        return view('client.car.car_detail', compact('car'));
    }
}
