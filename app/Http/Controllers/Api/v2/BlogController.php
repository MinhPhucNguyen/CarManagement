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
        $getAllBlogs = new BlogCollection(Blog::all()->reverse());
        $getLatestBlogs = new BlogCollection(Blog::latest()->take(4)->get());

        $response = [
            'all_blogs' => $getAllBlogs,
            'latest_blogs' => $getLatestBlogs
        ];

        return $response;
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', 'like', $slug)->first();
        return new BlogResource($blog);
    }
}
