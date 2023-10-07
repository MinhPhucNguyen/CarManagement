<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Resources\v2\CarCollection;
use App\Models\Car;
use Illuminate\Http\Request;
use DateTime;

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

        // dd($startDate, $endDate);

        //with() trong laravel để eager loading giúp tăng tốc độ truy vấn, tránh lỗi N+1 query 
        $searchResult = Car::where('location', 'like', "%$location%")->whereHas('carRentalPeriods', function ($query) use ($startDate, $endDate) {
            $query->where(
                'start_datetime',
                '>=',
                $startDate
            )->where('end_datetime', '<=', $endDate);
        })->get();

        return new CarCollection($searchResult);
    }
}
