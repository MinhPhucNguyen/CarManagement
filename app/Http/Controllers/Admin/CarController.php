<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $carsList = Car::all()->reverse();
        return view('admin.cars.index', compact('carsList'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.cars.create', compact('brands'));
    }
}
