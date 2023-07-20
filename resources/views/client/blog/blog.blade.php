@extends('layouts.app')

@section('content')
    <div class="blog-page w-100 h-100">
        <div class="blog-container">
            <h1 class="blog-title fw-bold">CA<span style="color: #1cc88a">R</span>ENTAL BLOG</h1>
            <div class="blog-content">
                <div class="blog-content-inner">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const getAllBlog = async () => {
            try {
                let response = await fetch("http://127.0.0.1:8000/api/v2/blogs");
                let data = await response.json();
                return data;
            } catch (err) {
                console.error("Error fetching data:", error);
            }
        }

        const getBlogImageUrl = (item) => {
            if (item != null) {
                return `{{ asset('../../uploads/blogs/blog-image-header/${item}') }}`;
            }
            return "{{ asset('../../image/car/car_image_test.jpg') }}";
        }

        const getDisc = (item) => {
            // Create a new DOMParser
            const parser = new DOMParser();
            // convert string to HTMLDocument
            const doc = parser.parseFromString(item, 'text/html');
            // Get all the <p> elements
            const paragraphs = doc.querySelectorAll('p');
            // Extract the first <p> tag and log its content
            const firstParagraph = paragraphs[0].outerHTML;
            return `<div class="disc">${firstParagraph}</div>`;
        }

        getAllBlog()
            .then((response) => {
                const blogContentInner = document.querySelector('.blog-content-inner');
                const disc = document.querySelector('.disc');
                const blog = response.data.map((blog) => {
                    return `<a href="/blogs/${blog.slug}" class="blog-item">
                            <div class="blog-img">
                                <img src="${getBlogImageUrl(blog.image)}" alt="">
                            </div>
                            <h5>${blog.title}</h5>
                            ${getDisc(blog.content)}
                        </a>`;
                });
                blogContentInner.innerHTML = blog.join('');
            })
    </script>
@endpush
