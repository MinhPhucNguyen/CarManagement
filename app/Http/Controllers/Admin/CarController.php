<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Requests\CarFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CarController extends Controller
{
    public function index(Request $request) {
        $carsList = Car::latest()->simplePaginate(10);

        return view('admin.cars.index', compact('carsList'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function show(int $carId)
    {
        $car = Car::findOrFail($carId);
        return view('admin.cars.view', compact('car'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        // $validatedInputs = $request->validated();
        // dd($request);
        // dd($validatedInputs);

        $car = new Car();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('upload/cars/', $filename);
            $car->image = $filename;
        }
        $car->carName = $request['carName'];
        $car->price = $request['price'];
        $car->color = $request['color'];
        $car->CarLicensePlate = $request['CarLicensePlate'];
        $car->save();

        return redirect('admin/cars')->with('success', 'Create car successfully');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(int $car_id, CarFormRequest $request)
    {
        $validatedData = $request->validated();
        // dd($user_id);
        // dd($request);

        $car = Car::findOrFail($car_id);

        if ($car) {
            $car->carName = $request['carName'];
            $car->CarLicensePlate = $request['CarLicensePlate'];
            $car->color = $request['color'];
            $car->price = $request['price'];
            $car->image = $request['image'];
            $car->update();
            return redirect('admin/cars')->with('success', "Car updated successfully");
        }
        else{
            return  redirect('admin/cars')->with('message', 'Car not found');
        }
    }

    public function destroy(int $car_id)
    {
        $car = Car::findOrFail($car_id);
        $car->delete();
        return redirect()->back()->with('success', 'Delete user successfully');
    }
}
