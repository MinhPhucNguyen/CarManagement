<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Resources\v2\CarCollection;
use App\Models\Car;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favoriteCars()
    {
        $user = auth()->user();

        //lấy tất các các xe đã yêu thích của người dùng.
        $cars = Car::whereHas('favoriteByUser', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return new CarCollection($cars);
    }

    public function addCar(int $carId)
    {
        $user = auth()->user();

        //Kiểm tra nếu đã thêm xe đó rồi thì không thêm nữa tránh lặp
        if ($user->favoriteCars()->where('favorites.car_id', $carId)->exists()) {
            return response()->json([
                'message' => 'Đã thêm vào danh sách yêu thích.'
            ], 200);
        }

        $user->favoriteCars()->attach($carId); //attach để thêm vào bảng trung gian của user và car

        return response()->json([
            'message' => 'Đã thêm vào danh sách yêu thích.'
        ], 200);
    }

    public function removeCar(int $carId)
    {
        $user = auth()->user();
        $user->favoriteCars()->detach($carId); //detach để xóa khỏi bảng trung gian của user và car
        return response()->json([
            'message' => 'Đã xóa khỏi danh sách yêu thích.'
        ], 200);
    }
}