<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $uploadURL = 'uploads/blogs/blog-image-content/';
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $extension = $file->getClientOriginalExtension();

            //get filename, not get extension
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // Custom file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $file->move($uploadURL, $fileNameToStore);

            // Get to show in ckeditor
            $url = asset($uploadURL . $fileNameToStore);
            return response()->json(['url' => $url, 'uploaded' => 1, 'fileName' => $fileNameToStore]);
        }
    }
}
