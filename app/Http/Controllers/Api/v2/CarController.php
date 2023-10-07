<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarFormRequest;
use App\Http\Resources\v2\CarCollection;
use App\Http\Resources\v2\CarResource;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Feature;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//Collection để trả về một tập hợp các resource (dữ liệu) trong một mảng
//Resource để trả về một resource (dữ liệu) duy nhất

class CarController extends Controller
{
    public function index()
    {
        $paginate = 10;

        $filter_by_brand = request('filter_by_brand');
        $filter_by_fuel = request('filter_by_fuel');

        $sort_direction = request('sort_direction', 'desc');
        if (!in_array($sort_direction, ['asc', 'desc'])) {
            $sort_direction = 'desc';
        }

        $sort_field = request('sort_field', 'car_id');
        if (!in_array($sort_field, ['car_id', 'car_name', 'seats', 'number_of_trip'])) {
            $sort_field = 'car_id';
        }

        $search = request('search', '');

        $cars = Car::with(['brand'])
            ->search(trim($search))
            ->when($filter_by_brand, function ($query) use ($filter_by_brand) {
                if ($filter_by_brand != 'all') {
                    $query->where('brand_id', $filter_by_brand);
                }
            })
            ->when($filter_by_fuel, function ($query) use ($filter_by_fuel) {
                if ($filter_by_fuel != 'all') {
                    $query->where('fuel', $filter_by_fuel);
                }
            })
            ->orderBy($sort_field, $sort_direction)
            ->paginate($paginate);

        return new CarCollection($cars);
    }

    public function getRandomCars()
    {
        return new CarCollection(Car::inRandomOrder()->take(8)->get());
    }

    public function show(Request $request)
    {
        $carId = $request->input('car_id'); //thêm input car_id vào đương dẫn url để lấy id
        $car = Car::findOrFail($carId);
        return new CarResource($car);
    }

    function formatDate($dateString)
    {
        $date = DateTime::createFromFormat('d/m/Y H:i', $dateString);
        return $date->format('Y-m-d H:i:s');
    }

    public function store(CarFormRequest $request)
    {
        $validatedData = $request->validated();
        $brand = Brand::findOrFail($validatedData['brand_id']);

        $car = $brand->cars()->create([
            'car_name' => $validatedData['car_name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'seats' => $validatedData['seats'],
            'fuel' => $validatedData['fuel'],
            'year' => $validatedData['year'],
            'status' => $request->status,
            'delivery_enable' => $request->delivery_enable,
            'speed' => $validatedData['speed'],
            'fuel_consumption' => $validatedData['fuel_consumption'],
            'transmission' => $validatedData['transmission'],
            'location' => $validatedData['location'],
            'number_of_trip' => $validatedData['number_of_trip'],
            'brand_id' => $validatedData['brand_id'],
        ]);

        /**
         * TODO: Save rental periods
         */
        if ($request->rental_periods) {
            foreach ($request->rental_periods as $period) {
                $startDateTime = $this->formatDate($period['from']);
                $endDateTime = $this->formatDate($period['to']);

                $car->carRentalPeriods()->create([
                    'start_datetime' => $startDateTime,
                    'end_datetime' => $endDateTime,
                    'is_active' => 1,
                ]);
            }
        }

        /**
         * TODO: Save features
         */
        if ($request->featuresId) {
            foreach ($request->featuresId as $featureId) {
                $feature = Feature::find($featureId);
                $car->features()->attach($feature);
            }
        }

        /**
         * TODO: Save images
         */
        if ($request->hasFile('car_images')) {
            $i = 1;
            foreach ($request->file('car_images') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = time() . "_" . $i++ . '.' . $extension;
                $imageFile->storeAs('carimages/' . $car->car_id . '/', $fileName);

                $car->carImages()->create([
                    'car_id' => $car->car_id,
                    'image' => $fileName,
                ]);
            }
        }
        return response()->json([
            'message' => 'Create car successfully!'
        ], 200);
    }

    public function edit(int $id)
    {
        $car = Car::with('carImages', 'carRentalPeriods')->where('car_id', $id)->first();

        if (!$car) {
            return response()->json([
                'message' => 'Car not found'
            ], 404);
        }

        $featuresId = $car->features->pluck('id')->toArray();

        return response()->json([
            'car' => $car,
            'featuresId' => $featuresId,
        ], 200);
    }

    public function update(int $id, CarFormRequest $request)
    {
        $validatedData = $request->validated();

        $car = Car::where('car_id', $id)->first();

        if (!$car) {
            return response()->json([
                'message' => 'Car not found'
            ], 404);
        }

        $car->update([
            'car_name' => $validatedData['car_name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'seats' => $validatedData['seats'],
            'fuel' => $validatedData['fuel'],
            'year' => $validatedData['year'],
            'status' => $request->status,
            'delivery_enable' => $request->delivery_enable,
            'speed' => $validatedData['speed'],
            'fuel_consumption' => $validatedData['fuel_consumption'],
            'transmission' => $validatedData['transmission'],
            'location' => $validatedData['location'],
            'number_of_trip' => $validatedData['number_of_trip'],
            'brand_id' => $validatedData['brand_id'],
        ]);

        if ($request->rental_periods) {
            $car->carRentalPeriods()->delete();
            foreach ($request->rental_periods as $period) {
                //updateOrCreate để tạo mới hoặc cập nhật nếu đã tồn tại
                $car->carRentalPeriods()->updateOrCreate([
                    'start_datetime' => $period['from'],
                    'end_datetime' => $period['to'],
                    'is_active' => 1,
                ]);
            }
        }

        if ($request->featuresId) {
            $car->features()->detach();
            foreach ($request->featuresId as $val) {
                $feature = Feature::find($val);
                $car->features()->attach($feature);
            }
        }

        if ($request->hasFile('car_images')) {
            $i = 1;
            foreach ($request->file('car_images') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension(); //get extension of image (jpg, png,...)
                $fileName = time() . $i++ . '.' . $extension; //set new file name for image
                $imageFile->storeAs('carimages/' . $car->car_id . '/', $fileName);

                $car->carImages()->create([
                    'car_id' => $car->car_id,
                    'image' => $fileName,
                ]);
            }
        }

        return response()->json([
            'message' => 'Update car successfully!',
            'carImages' => $car->carImages
        ], 200);
    }

    public function destroyImage($id, $filename)
    {
        $car = Car::find($id);
        if ($car) {
            $carImage = CarImage::where('image', $filename)->first();

            if (!$carImage) {
                return response()->json([
                    'message' => 'Image not found',
                ], 404);
            }

            $imageUrl = parse_url($carImage->image, PHP_URL_PATH); //Chuyển đổi URL thành đường dẫn tương đối trong đĩa lưu trữ
            $basePath = '/storage/carimages/' . $id . '/';
            if (strpos($imageUrl, $basePath) === 0) {
                $imagePath = substr($imageUrl, strlen($basePath)); //Trả về một chuỗi con từ vị trí bắt đầu là độ dài của chuỗi $basePath
                if (Storage::exists('carimages/' . $id . '/' . $imagePath)) {
                    Storage::delete('carimages/' . $id . '/' . $imagePath);
                }
            }
            $carImage->delete();
        }

        return response()->json([
            'message' => 'Car image delete successfully',
            'carImages' => $car->carImages
        ], 200);
    }

    public function destroy(int $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(
                [
                    'message' => 'Car not found',
                ],
                404
            );
        }

        if ($car->carImages()) {
            foreach ($car->carImages as $image) {
                $imageUrl = parse_url($image->image, PHP_URL_PATH); //Chuyển đổi URL thành đường dẫn tương đối trong đĩa lưu trữ
                $basePath = '/storage/carimages/' . $id . '/';
                if (strpos($imageUrl, $basePath) === 0) { //Kiểm tra xem chuỗi có bắt đầu bằng chuỗi khác hay không
                    $imagePath = substr($imageUrl, strlen($basePath)); //Trả về một chuỗi con từ vị trí bắt đầu là độ dài của chuỗi $basePath
                    if (Storage::exists('carimages/' . $id . '/' . $imagePath)) {
                        Storage::delete('carimages/' . $id . '/' . $imagePath);
                    }
                }
            }
            if (Storage::exists('carimages/' . $id)) {
                if (empty(Storage::allFiles('carimages/' . $id))) {
                    Storage::deleteDirectory('carimages/' . $id);
                }
            }
        }

        $car->delete();

        return response()->json(
            [
                'message' => 'Delete car successfully!',
            ],
            200
        );
    }
}
