@extends('layouts.app')

@section('content')
    <div class="blog-page w-100 h-100">
        <div class="blog-container">
            <h1 class="blog-title fw-bold">CA<span style="color: #1cc88a">R</span>ENTAL BLOG</h1>
            <div class="blog-content">
                <div class="blog-content-inner">
                   @include('client.blog.item-blog')
                </div>
            </div>
        </div>
    </div>
@endsection
