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
use Illuminate\Support\Facades\Storage;

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
        // dd($request);
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
        // dd($request->features);
        if ($request->featureIds != NULL) {
            $featureIdChose = explode(',', $request->featureIds); //convert string to array
            // dd($featureIdChose);
            $car->features()->attach($featureIdChose);
        }

        if ($request->hasFile('image')) {
            // dd($request->file('image')); return an array 

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension(); //get extension of image (jpg, png,...)
                $fileName = time() . $i++ . '.' . $extension; //set new file name for image
                $imageFile->storeAs('carimages', $fileName);

                $car->carImages()->create([
                    'car_id' => $car->car_id,
                    'image' => $fileName,
                ]);
            }
        }
        return redirect('admin/cars')->with('message', 'Car Created Successfully');
    }

    public function edit($car_id)
    {
        $brands = Brand::all();
        $features = Feature::all();
        $car = Car::where('car_id', $car_id)->first();
        $featuresOfTheCar = $car->features->pluck('id')->toArray();

        return view('admin.cars.edit', compact('brands', 'car', 'features', 'featuresOfTheCar'));
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

            //Handle update feature
            $featuresOfTheCar = $car->features->pluck('id')->toArray(); //get feature stored in database
            $featuresOfTheCarIds = [];
            $featureIdRemove = explode(',', $request->featureIdsRemove);
            if ($request->has('featureIdsChose')) {
                $featureIdChose = explode(',', $request->featureIdsChose); //trả về một mảng các featureId được chọn, sử dụng explode('ký tự phân cách', 'chuỗi phân cách') để chuyển chuỗi trả về do $request->featureIdsChose thành mảng
                foreach ($featureIdChose as $featureEdit) {
                    if (!collect($featuresOfTheCar)->contains($featureEdit) && $featureEdit != NULL) { //use collection 
                        $featuresOfTheCarIds = collect([$featuresOfTheCar, $featureIdChose])->collapse();
                    } else {
                        $featuresOfTheCarIds = $featuresOfTheCar;
                    }
                }
                $car->features()->sync($featuresOfTheCarIds);

                //xóa feature đã lưu trong database
                foreach ($featuresOfTheCarIds as $featureId) {
                    if (in_array($featureId, $featureIdRemove)) { //nếu $featuteId có trong mảng $featureIdRemove
                        $car->features()->detach($featureId);
                    }
                }
            }

            if ($request->hasFile('image')) {
                // dd($request->file('image')); return an array 

                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension(); //get extension of image (jpg, png,...)
                    $fileName = time() . $i++ . '.' . $extension; //set new file name for image
                    $imageFile->storeAs('carimages', $fileName);

                    $car->carImages()->create([
                        'car_id' => $car->car_id,
                        'image' => $fileName,
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
        $imageUrl = parse_url($carImage->image, PHP_URL_PATH); //Chuyển đổi URL thành đường dẫn tương đối trong đĩa lưu trữ 
        $imagePath = ltrim($imageUrl, '/storage'); //bỏ đi storage/ trong đường dẫn
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        $carImage->delete();
        return redirect()->back()->with('message', 'Car Image Deleted successfully');
    }

    public function destroy(int $car_id)
    {
        $car = Car::find($car_id);
        if ($car->carImages()) {
            foreach ($car->carImages as $image) {
                $imageUrl = parse_url($image->image, PHP_URL_PATH); //Chuyển đổi URL thành đường dẫn tương đối trong đĩa lưu trữ
                $imagePath = ltrim($imageUrl, '/storage'); //bỏ đi storage/ trong đường dẫn
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
            }
        }
        $car->delete();
        return redirect()->back()->with('message', 'Car Deleted Successfully');
    }
}
