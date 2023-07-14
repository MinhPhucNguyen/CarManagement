<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarFormRequest;
use App\Http\Resources\v1\CarCollection;
use App\Http\Resources\v1\CarResource;
use App\Models\Brand;
use App\Models\Car;

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
