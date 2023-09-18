<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('brand_id', 'desc')->get();
        return response()->json([
            'brands' => $brands
        ], 200);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|unique:brands,brand_name',
        ]);
        $brand = Brand::create([
            'brand_name' => Str::upper($validatedData['brand_name']),
            'status' => $request->status
        ]);

        return response()->json(
            [
                'message' => 'Create successfully!',
                'brand' => $brand
            ],
            200
        );
    }

    public function update(int $brand_id, Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|unique:brands,brand_name,' . $brand_id . ',brand_id'
        ]);

        Brand::findOrFail($brand_id)->update([
            'brand_name' => $validatedData['brand_name'],
            'status' => $request->status
        ]);

        return response()->json(
            [
                'message' => 'Update successfully!',
            ],
            200
        );
    }

    public function delete(int $brand_id)
    {
        Brand::findOrFail($brand_id)->delete();
        return response()->json(
            [
                'message' => 'Delete successfully!',
            ],
            200
        );
    }
}
