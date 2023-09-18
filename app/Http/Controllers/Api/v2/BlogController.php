<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v2\BlogCollection;
use App\Http\Resources\v2\BlogResource;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $getAllBlogs = new BlogCollection(Blog::all()->reverse());

        return response()->json([
            'blogs' => $getAllBlogs,
        ], 200);
    }

    public function getBlogBySlug($slug)
    {
        $blog = Blog::where('slug', 'like', $slug)->first();
        return response()->json([
            'blog' => new BlogResource($blog),
        ], 200);
    }

    public function getBlogById(int $id)
    {
        $blog = Blog::findOrFail($id);
        return response()->json([
            'blog' => new BlogResource($blog),
        ], 200);
    }

    public function createBlog(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'slug' => 'required',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->slug = Str::slug($validatedData['slug']);
        $blog->content = $validatedData['content'];
        $blog->status = $request->status;

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $request->file('image')->storeAs('blogimages', $fileName);
            $blog->image = $fileName;
        }
        $blog->save();

        return response()->json([
            'message' => 'Create Blog Successfully!',
            'blog' => $blog
        ], 200);
    }

    public function updateBlog(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'slug' => 'required',
            'content' => 'required',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $validatedData['title'];
        $blog->slug = Str::slug($validatedData['slug']);
        $blog->content = $validatedData['content'];
        $blog->status = $request->status;

        if ($request->hasFile('image')) {
            if ($blog->image) {
                $imageUrl = parse_url($blog->image, PHP_URL_PATH);
                $imagePath = ltrim($imageUrl, '/storage/blogimages'); //bỏ đi storage/ trong đường dẫn
                if (Storage::exists('blogimages/' . $imagePath)) {
                    Storage::delete('blogimages/' . $imagePath);
                }
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $request->file('image')->storeAs('blogimages', $fileName);
            $blog->image = $fileName;
        }
        $blog->save();

        return response()->json([
            'message' => 'Blog Updated Successfully!',
        ], 200);
    }

    public function deleteBlog(int $id)
    {
        $blog = Blog::find($id);


        if ($blog->content) {
            /**
             * preg_match_all: Tìm tất cả các chuỗi khớp với biểu thức chính quy
             * '/<img[^>]+src="([^"]+)"[^>]*>/' lấy tất cả các thẻ img có thuộc tính src và lấy giá trị của thuộc tính src
             */
            preg_match_all('/<img[^>]+src="([^"]+)"[^>]*>/', $blog->content, $matches);
            $allImageUrls = $matches[1];
            foreach ($allImageUrls as $imageUrl) {
                $imageUrl = parse_url($imageUrl, PHP_URL_PATH);
                $imagePath = ltrim($imageUrl, '/storage/blogimages/imageContent'); //bỏ đi storage/ trong đường dẫn
                if (Storage::exists('blogimages/imageContent/' . $imagePath)) {
                    Storage::delete('blogimages/imageContent/' . $imagePath);
                };
            }
        }

        if ($blog->image) {
            $imageUrl = parse_url($blog->image, PHP_URL_PATH);
            $imagePath = ltrim($imageUrl, '/storage/blogimages'); //bỏ đi storage/ trong đường dẫn
            if (Storage::exists('blogimages/' . $imagePath)) {
                Storage::delete('blogimages/' . $imagePath);
            };
        }


        $blog->delete();
        return response()->json([
            'message' => 'Blog Deleted Successfully!',
        ], 200);
    }
}
