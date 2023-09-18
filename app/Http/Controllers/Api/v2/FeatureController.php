<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('id', 'desc')->get();
        return response()->json([
            'features' => $features
        ], 200);
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|unique:features,name',
        ]);

        $feature = Feature::create([
            'name' => $validatedData['name'],
            'logo' => $request->logo,
        ]);

        return response()->json([
            'message' => "Create new feature successfully!",
            'feature' => $feature
        ], 200);
    }

    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:features,name,' . $id . ',id',
        ]);

        $feature = Feature::findOrFail($id);
        if ($feature) {
            $feature->update([
                'name' => $validatedData['name'],
                'logo' => $request->logo
            ]);
        }

        return response()->json(
            [
                'message' => 'Update feature successfully!',
            ],
            200
        );
    }

    public function delete(int $id)
    {
        Feature::findOrFail($id)->delete();
        return response()->json(
            [
                'message' => 'Delete feature successfully!',
            ],
            200
        );
    }
}
