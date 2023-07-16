<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create(){
        return view('admin.blog.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->slug = $validatedData['slug'];
        $blog->content = $validatedData['content'];
        $blog->status = $request->status ? '1' : '0';

        $blog->save();

        return redirect(route('blogs.index'))->with('message','Create Blog Successfully');
    }
}
