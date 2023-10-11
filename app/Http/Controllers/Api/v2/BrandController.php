<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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


        $filename = null;
        if ($request->hasFile('logo')) {
            $logoImage = $request->file('logo');
            $filename = $logoImage->getClientOriginalName();
            $logoImage->storeAs('brandimages/' . $filename);
        }

        $brand = Brand::create([
            'logo' => $filename,
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

        $brand = Brand::findOrFail($brand_id);

        if (!$brand) {
            return response()->json(
                [
                    'message' => 'Brand not found!',
                ],
                404
            );
        }

        $filename = null;
        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                $imageUrl = parse_url($brand->logo, PHP_URL_PATH);
                $imagePath = ltrim($imageUrl, '/storage/brandimages'); //bỏ đi storage/ trong đường dẫn
                if (Storage::exists('brandimages/' . $imagePath)) {
                    Storage::delete('brandimages/' . $imagePath);
                }
            }
            $logoImage = $request->file('logo');
            $filename = $logoImage->getClientOriginalName();
            $logoImage->storeAs('brandimages/' . $filename);
        }

        $brand->update([
            'logo' => $filename,
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
        $brand =    Brand::findOrFail($brand_id);
        if (!$brand) {
            return response()->json(
                [
                    'message' => 'Brand not found!',
                ],
                404
            );
        }
        if ($brand->logo) {
            $imageUrl = parse_url($brand->logo, PHP_URL_PATH);
            $imagePath = ltrim($imageUrl, '/storage/brandimages'); //bỏ đi storage/ trong đường dẫn
            if (Storage::exists('brandimages/' . $imagePath)) {
                Storage::delete('brandimages/' . $imagePath);
            }
        }
        $brand->delete();
        return response()->json(
            [
                'message' => 'Delete successfully!',
            ],
            200
        );
    }
}
