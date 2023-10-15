<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Resources\v2\CarCollection;
use App\Models\Car;
use Illuminate\Http\Request;
use DateTime;

use function PHPSTORM_META\type;

class SearchCarController extends Controller
{
    function formatDate($dateString)
    {
        $date = DateTime::createFromFormat('d/m/Y H:i', $dateString);
        return $date->format('Y-m-d H:i:s');
    }
    public function searchCar()
    {
        $startDate = $this->formatDate(request('startDate'));
        $endDate = $this->formatDate(request('endDate'));
        $location = request('location');
        $carTypes = request('carTypes');
        $brandChecked = request('brandChecked');
        $delivery = request('delivery');
        $transmission = request('transmission');
        $fuel = request('fuel');
        $priceRange = request('priceRange');
        $seatRange = request('seatRange');
        $yearRange = request('yearRange');
        $features = request('features');
        $fuelConsumptionRange = request('fuelConsumptionRange');

        //with() trong laravel để eager loading giúp tăng tốc độ truy vấn, tránh lỗi N+1 query 
        $searchResult = Car::where('location', 'like', "%$location%")
            ->whereHas('carRentalPeriods', function ($query) use ($startDate, $endDate) {
                $query->where(
                    'start_datetime',
                    '>=',
                    $startDate
                )->where('end_datetime', '<=', $endDate);
            })
            ->when($carTypes, function ($query) use ($carTypes) {
                if (count($carTypes) > 0) {
                    // whereIn có tác dụng tìm bản ghi có giá trị của 1 cột xác định nằm xong một mảng xác giá trị;
                    $query->whereIn('seats', $carTypes); //Tìm các xe có số ghế ngồi bằng với giá trị trong mảng $carTypes
                }
            })
            ->when($brandChecked, function ($query) use ($brandChecked) {
                if ($brandChecked > 0) {
                    $query->where('brand_id', $brandChecked);
                }
                $query->get();
            })
            ->when($delivery, function ($query) use ($delivery) {
                $query->where('delivery_enable', $delivery);
            })
            ->when($transmission !== "all", function ($query) use ($transmission) {
                $query->where('transmission', $transmission);
            })
            ->when($fuel, function ($query) use ($fuel) {
                if ($fuel !== "") {
                    $query->where('fuel', $fuel);
                }
                $query->get();
            })
            ->when($features, function ($query) use ($features) {
                if (count($features) > 0) {
                    $query->whereHas('features', function ($subquery) use ($features) {
                        $subquery->whereIn('feature_id', $features);
                    });
                }
            })
            ->when($fuelConsumptionRange, function ($query) use ($fuelConsumptionRange) {
                $query->where('fuel_consumption', '<=', $fuelConsumptionRange['fuelConsumption']);
            })
            ->when($priceRange, function ($query) use ($priceRange) {
                $query->where('price', '>=', $priceRange['min'])
                    ->where('price', '<=', $priceRange['max']);
            })
            ->when($seatRange, function ($query) use ($seatRange) {
                $query->where('seats', '>=', $seatRange['min'])
                    ->where('seats', '<=', $seatRange['max']);
            })
            ->when($yearRange, function ($query) use ($yearRange) {
                $query->where('year', '>=', $yearRange['min'])
                    ->where('year', '<=', $yearRange['max']);
            })
            ->get();

        return new CarCollection($searchResult);
    }
}