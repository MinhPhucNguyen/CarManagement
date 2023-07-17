<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    // Upload image into blog content
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $uploadPath = 'uploads/blogs/blog-content-image/';
            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName =  time() . '.' . $extension;
            $request->file('upload')->move(public_path($uploadPath, $fileName));
            $url = asset($uploadPath . $fileName);
            return response()->json(['url' => $url]);
        }
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->slug = $validatedData['slug'];
        $blog->content = $validatedData['content'];
        $blog->status = $request->status ? '1' : '0';

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/blogs/blog-image-header/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            Image::make($request->file('image'))->resize(400, 200)->save(public_path($uploadPath . $fileName));
            $blog->image = $fileName;
        }

        $blog->save();

        return redirect(route('blogs.index'))->with('message', 'Create Blog Successfully');
    }
}
