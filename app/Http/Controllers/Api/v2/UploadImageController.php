<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\BlogImage;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image-content')) {
            $extension = $request->file('image-content')->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $request->file('image-content')->storeAs('blogimages/imageContent', $filename); //lưu vào localStorage
            return response()->json(['url' => $filename], 200);
        }
    }
}
