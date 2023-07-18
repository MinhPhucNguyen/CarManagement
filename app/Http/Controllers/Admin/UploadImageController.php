<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class UploadImageController extends Controller
{
    // Upload image into blog content
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $uploadedFile = $request->file('upload');
            $filename = $uploadedFile->getClientOriginalName();
            $uploadedFile->storeAs('public/uploads/blogs/blog-image-content/', $filename);

            $url = asset('storage/uploads/' . $filename);
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }
}
