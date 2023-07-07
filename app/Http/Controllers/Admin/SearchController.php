<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $table = $request->input('table');
        $searchValue = $request->input('search');

        if ($table == 'users' && $searchValue != NULL) {
            $usersList = User::where('username', 'like', "%$searchValue%")->paginate(15);

            return view('admin.users.index', compact('usersList'));
        } elseif ($table == 'cars'  && $searchValue != NULL) {
            $brands = Brand::all();
            $fuels = Car::select('fuel')->groupBy('fuel')->get();
            $carsList = Car::where('car_name', 'like', "%$searchValue%")->paginate(15);

            return view('admin.cars.index', compact('carsList', 'brands', 'fuels'));
        } else {
            return redirect()->back()->with('search_message', '*Please enter a keyword.');
        }
    }
}
