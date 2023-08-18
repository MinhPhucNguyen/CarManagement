<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $request->file('image')->storeAs('blogimages', $fileName);
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
            if ($blog->image) {
                $imageUrl = parse_url($blog->image, PHP_URL_PATH);
                $imagePath = ltrim($imageUrl, '/storage'); //bỏ đi storage/ trong đường dẫn
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            ($request->file('image')->storeAs('blogimages', $fileName));
            $blog->image = $fileName;
        }

        $blog->save();

        return redirect(route('blogs.index'))->with('message', 'Updated Blog Successfully');
    }

    public function destroy(int $id)
    {
        $blog = Blog::find($id);
        if ($blog->image) {
            $imageUrl = parse_url($blog->image, PHP_URL_PATH);
            $imagePath = ltrim($imageUrl, '/storage'); //bỏ đi storage/ trong đường dẫn
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }
        $blog->delete();
        return redirect(route('blogs.index'))->with('message', 'Delete Blog Successfully');
    }
}
