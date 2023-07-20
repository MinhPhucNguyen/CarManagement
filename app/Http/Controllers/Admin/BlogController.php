<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.index', compact('blogs'));
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
        $blog->slug = Str::slug($validatedData['slug']);
        $blog->content = $validatedData['content'];
        $blog->status = $request->status ? '1' : '0';

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/blogs/blog-image-header/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            Image::make($request->file('image'))->save(public_path($uploadPath . $fileName));
            $blog->image = $fileName;
        }

        $blog->save();

        return redirect(route('blogs.index'))->with('message', 'Create Blog Successfully');
    }

    public function edit(int $id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = Blog::find($id);
        $blog->title = $validatedData['title'];
        $blog->slug = Str::slug($validatedData['slug']);
        $blog->content = $validatedData['content'];
        $blog->status = $request->status ? '1' : '0';

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/blogs/blog-image-header/';

            if ($blog->image && File::exists(public_path($uploadPath . $blog->image))) {
                File::delete(public_path($uploadPath . $blog->image));
            }

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            Image::make($request->file('image'))->save(public_path($uploadPath . $fileName));
            $blog->image = $fileName;
        }

        $blog->save();

        return redirect(route('blogs.index'))->with('message', 'Updated Blog Successfully');
    }

    public function destroy(int $id)
    {
        $uploadPath = 'uploads/blogs/blog-image-header/';
        $blog = Blog::find($id);
        if ($blog->image && File::exists(public_path($uploadPath . $blog->image))) {
            File::delete(public_path($uploadPath . $blog->image));
        }
        $blog->delete();
        return redirect(route('blogs.index'))->with('message', 'Delete Blog Successfully');
    }
}
