<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request) {
        $carsList = Car::latest()->simplePaginate(10);

        return view('admin.cars.index', compact('carsList'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
