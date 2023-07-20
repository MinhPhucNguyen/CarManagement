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

        // Get existing files
        $existingFiles = File::files(public_path($uploadURL));
        $existingUrls = [];

        foreach ($existingFiles as $existingFile) {
            $existingUrl = asset($uploadURL . $existingFile->getFilename());
            $existingUrls[] = $existingUrl;
        }

        $url = null;

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $extension = $file->getClientOriginalExtension();
            //get filename, not get extension
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            // Custom file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $file->move(public_path($uploadURL), $fileNameToStore);
            $url = asset($uploadURL . $fileNameToStore);

            // Delete old files if any and not found in uploadedUrls
            foreach ($existingUrls as $existingUrl) {
                if (!in_array($existingUrl, [$url])) {
                    $fileNameToDelete = str_replace(asset($uploadURL), '', $existingUrl);
                    File::delete(public_path($uploadURL . $fileNameToDelete));
                }
            }
        }
        // return response()->json(['url' => $url, 'uploaded' => 1, 'fileName' => $fileNameToStore]);


        // Return the URLs of the images already stored in $uploadURL and the URL of the newly uploaded image (if any)
        return response()->json(['urls' => $existingUrls, 'url' => $url ?? null, 'uploaded' => 1, 'fileName' => $fileNameToStore ?? null]);
    }
}
