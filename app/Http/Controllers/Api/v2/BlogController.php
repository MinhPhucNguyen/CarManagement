<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v2\BlogCollection;
use App\Http\Resources\v2\BlogResource;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return new BlogCollection(Blog::all()->reverse());
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', 'like', $slug)->first();
        return new BlogResource($blog);
    }
}
