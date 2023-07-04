<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarFormRequest;
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

    public function store(CarFormRequest $request)
    {
        $validatedData = $request->validated();

        $brand = Brand::find($validatedData['brand']);

        $car = $brand->cars()->create([
            'car_name' => $validatedData['car_name'],
            'price' => $validatedData['price'],
            'seats' => $validatedData['seats'],
            'fuel' => $validatedData['fuel'],
            'year' => $validatedData['year'],
            'speed' => $validatedData['speed'],
            'capacity' => $validatedData['capacity'],
            'brand_id' => $validatedData['brand'],
        ]);

        if($request->hasFile('image')){
            $uploadsPath = 'uploads/products/';
        }

        return redirect('admin/cars')->with('success', 'Car Created Successfully');
    }
}
