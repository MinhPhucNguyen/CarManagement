<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarFormRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();
        $fuels = Car::select('fuel')->groupBy('fuel')->get();
        $sortDirection = $request->input('direction');
        $sortColumn = $request->input('sort');

        $carsList = Car::when($request->filterByBrand != NULL, function ($q) use ($request,  $sortDirection,  $sortColumn) {
            if ($request->filterByBrand == 'all') {
                return $q->orderBy($sortColumn ?? 'car_id', $sortDirection ?? 'desc');
            } else {
                return $q->where('brand_id', $request->filterByBrand);
            }
        })
            ->when($request->filterByBrand != NULL && $request->filterByFuel != NULL, function ($q) use ($request) {
                if ($request->filterByFuel != 'all') {
                    return $q->where('fuel', $request->filterByFuel);
                } else {
                    return $q;
                }
            })
            ->orderBy($sortColumn ?? 'car_id', $sortDirection ?? 'desc')
            ->simplePaginate(10);

        $carsList->appends([
            'filterByBrand' => $request->filterByBrand,
            'filterByFuel' => $request->filterByFuel,
            'sort' => $sortColumn,
            'direction' => $sortDirection,
        ]);

        return view('admin.cars.index', compact('carsList', 'brands', 'fuels'));
    }

    public function create()
    {
        $features = Feature::all();
        $brands = Brand::all();
        return view('admin.cars.create', compact('brands', 'features'));
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
            'status' => $request->status ? '1' : '0',
            'delivery_enable' => $request->delivery_enable ? '1' : '0',
            'speed' => $validatedData['speed'],
            'fuel_consumption' => $validatedData['fuel_consumption'],
            'transmission' => $validatedData['transmission'],
            'location' => $validatedData['location'],
            'number_of_trip' => $validatedData['trip'],
            'brand_id' => $validatedData['brand'],
        ]);

        // dd($car);

        if ($request->hasFile('image')) {
            $uploadsPath = 'uploads/products/';
            // dd($request->file('image')); return an array 

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension(); //get extension of image (jpg, png,...)
                $fileName = time() . $i++ . '.' . $extension; //set new file name for image
                $imageFile->move($uploadsPath, $fileName); //move $fileName is new filename for $imageFile to $uploadsPath
                $finalImagePathName = $uploadsPath . $fileName;

                $car->carImages()->create([
                    'car_id' => $car->car_id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        return redirect('admin/cars')->with('message', 'Car Created Successfully');
    }

    public function edit($car_id)
    {
        $brands = Brand::all();
        $car = Car::find($car_id);
        return view('admin.cars.edit', compact('brands', 'car'));
    }

    public function update(CarFormRequest $request, $car_id)
    {
        $validatedData = $request->validated();

        $car = Brand::find($validatedData['brand'])->cars()->where('car_id', $car_id)->first();

        if ($car) {
            $car->update([
                'car_name' => $validatedData['car_name'],
                'price' => $validatedData['price'],
                'description' => $validatedData['description'],
                'seats' => $validatedData['seats'],
                'fuel' => $validatedData['fuel'],
                'year' => $validatedData['year'],
                'speed' => $validatedData['speed'],
                'status' => $request->status ? '1' : '0',
                'delivery_enable' => $request->delivery_enable ? '1' : '0',
                'fuel_consumption' => $validatedData['fuel_consumption'],
                'transmission' => $validatedData['transmission'],
                'location' => $validatedData['location'],
                'number_of_trip' => $validatedData['trip'],
                'brand_id' => $validatedData['brand'],
            ]);

            if ($request->hasFile('image')) {
                $uploadsPath = 'uploads/products/';
                // dd($request->file('image')); return an array 

                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension(); //get extension of image (jpg, png,...)
                    $fileName = time() . $i++ . '.' . $extension; //set new file name for image
                    $imageFile->move($uploadsPath, $fileName); //move $fileName is new filename for $imageFile to $uploadsPath
                    $finalImagePathName = $uploadsPath . $fileName;

                    $car->carImages()->create([
                        'car_id' => $car->car_id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            return redirect('admin/cars')->with('message', 'Car Updated Successfully');
        } else {
            return redirect('admin/cars');
        }
    }

    public function destroyImage(int $car_image_id)
    {
        $carImage = CarImage::find($car_image_id);
        if (File::exists($carImage->image)) {
            File::delete($carImage->image);
        }
        $carImage->delete();
        return redirect()->back()->with('message', 'Car Image Deleted successfully');
    }

    public function destroy(int $car_id)
    {
        $car = Car::find($car_id);
        if ($car->carImages()) {
            foreach ($car->carImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $car->delete();
        return redirect()->back()->with('message', 'Car Deleted Successfully');
    }
}
