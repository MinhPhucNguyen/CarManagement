@extends('layouts.app')

@section('content')
    <div class="blog-page w-100 h-100">
        <div class="blog-container">
            <h1 class="blog-title fw-bold">CA<span style="color: #1cc88a">R</span>ENTAL BLOG</h1>
            <div class="blog-latest w-100 d-flex">
                <div class="blog-latest-main"></div>
                <div class="blog-latest-other"></div>
            </div>
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
            // Extract the first <> tag and log its content
            const firstParagraph = paragraphs[0].outerHTML;
            return `<div class="disc">${firstParagraph}</div>`;
        }

        getAllBlog()
            .then((response) => {
                    const blogContentInner = document.querySelector('.blog-content-inner');
                    const disc = document.querySelector('.disc');
                    const blogLatest = document.querySelector('.blog-latest');
                    const blogLatestMain = document.querySelector('.blog-latest-main');
                    const blogLatestOther = document.querySelector('.blog-latest-other');

                    const allBlogs = response.all_blogs.map((blog) => {
                        if (blog.status == 1) {
                            return `<a href="/blogs/${blog.slug}" class="blog-item">
                            <div class="blog-img">
                                <img src="${getBlogImageUrl(blog.image)}" alt="blog-img">
                            </div>
                            <h5>${blog.title}</h5>
                            ${getDisc(blog.content)}
                        </a>`;
                        }
                        return '';
                    });
                    blogContentInner.innerHTML = allBlogs.join('');

                    if (response.latest_blogs[0] && response.latest_blogs[0].status == 1) {
                        const mainLatestBlog = response.latest_blogs[0];
                        blogLatestMain.innerHTML = `
                        <a href="/blogs/${mainLatestBlog.slug}" class="d-inline-block w-100">
                            <img src="${getBlogImageUrl(mainLatestBlog.image)}" alt="" class="w-100">
                            <h5> ${mainLatestBlog.title} </h5>
                        </a>
                        ${getDisc(mainLatestBlog.content)}
                    `;
                    }

                    const latestBlog = response.latest_blogs.map((blog) => {
                        if (blog.status == 1 && response.latest_blogs[0].blog_id != blog.blog_id) {
                            return `
                            <a href="/blogs/${blog.slug}" class="blog-latest-other-item">
                                <img src="${getBlogImageUrl(blog.image)}" alt="">
                                <div class="content">
                                    <h6>${blog.title}</h6>
                                    ${getDisc(blog.content)} 
                                </div>
                            </a>
                        `;
                        }
                        return '';
                    });
                    blogLatestOther.innerHTML = latestBlog.join('');
            })
    </script>
@endpush
