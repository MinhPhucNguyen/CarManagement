<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarFormRequest;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {
        return new CarCollection(Car::all());
    }


    public function create()
    {
        //
    }

    public function store(CarFormRequest $request)
    {
        $validatedData = $request->validated();

        $brand = Brand::find($validatedData['brand']);

        $car = $brand->cars()->create([
            'car_name' => $validatedData['car_name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'seats' => $validatedData['seats'],
            'fuel' => $validatedData['fuel'],
            'year' => $validatedData['year'],
            'speed' => $validatedData['speed'],
            'capacity' => $validatedData['capacity'],
            'brand_id' => $validatedData['brand'],
        ]);

        return new CarResource($car);
    }

    public function show(string $id)
    {
        return new CarResource(Car::findOrFail($id));
    }
    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return new CarResource($car);
    }


    public function destroy(string $id)
    {
        $car = Car::find($id);
        $car->delete();
    }
}
