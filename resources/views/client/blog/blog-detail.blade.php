@extends('layouts.app')

@section('content')
    <div class="blog-page w-100 h-100">
        <div class="blog-container">
            THIS BLOG DETAIL
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const slug = '{{ $slug }}'
        const getBlogDetail = async () => {
            const response = await fetch(`http://127.0.0.1:8000/api/v2/blogs/${slug}`)
            const data = await response.json();
            return data;
        }

        getBlogDetail()
            .then((response) => {
                console.log(response.data);
            })
    </script>
@endpush