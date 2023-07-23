@extends('layouts.app')

@section('content')
    <div class="blog-page w-100 h-100 bg-white border-top border-bottom">
        <div class="blog-detail-container"></div>
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
                const blogDetailContainer = document.querySelector('.blog-detail-container');
                const createdDate = new Date(response.data.created_at);
                const currentDate = new Date();

                const timeDistance = currentDate.getTime() - createdDate.getTime();
                const daysAgo = Math.floor(timeDistance / (1000 * 3600 * 24));

                const dayDisplay = daysAgo == 0 ? "Today" : daysAgo == 1 ? "Yesterday" : `${daysAgo} days ago`;

                const html = ` 
                <img src="{{ asset('../../uploads/blogs/blog-image-header/${response.data.image}') }}" alt="" class="main-blog-image">
                                <div class="blog-detail-content">
                                    <h1>${response.data.title}</h1>
                                    <strong>Create at: </strong> <span>${dayDisplay}</span>  
                                    <div class="content">
                                        ${response.data.content}
                                    </div>
                                </div>`
                blogDetailContainer.innerHTML = html;
            })
    </script>
@endpush
