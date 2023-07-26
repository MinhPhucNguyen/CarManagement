<div id="blog-section">
    <div class="section-container">
        <p class="section-title">
            CA<span style="color: #1cc88a">R</span>ENTAL Blog
        </p>
        <div class="blog-section-container">
            <div class="blog-wrap_1">
            </div>
            <div class="blog-wrap_2">
            </div>
        </div>
    </div>
</div>

@push('app-scripts')
    <script>
        const getBlog = async () => {
            let response = await fetch("http://127.0.0.1:8000/api/v2/blogs");
            let data = await response.json();
            return data;
        }

        getBlog()
            .then((response) => {
                const blogSection = response.latest_blogs.slice(0, 3);
                const blogWrap1 = document.querySelector('.blog-wrap_1');
                const blogWrap2 = document.querySelector('.blog-wrap_2');

                const handleDateCreatedAt = (item) => {
                    const date = new Date(item);
                    const day = date.getDate();
                    const month = '0' + (date.getMonth() + 1);
                    const year = date.getFullYear();
                    return `${day}-${month}-${year}`;
                }

                const html = blogSection.map((blog) => {
                    if (blog.blog_id !== blogSection[blogSection.length - 1].blog_id) {
                        return `
                        <a href="/blogs/${blog.slug}" class="blog-item">
                            <div class="blog-item_img">
                                <img src="{{ asset('../../uploads/blogs/blog-image-header/${blog.image}') }}" alt="">
                            </div>
                            <div class="blog-item_content">
                                <p class="time-text text-light mb-0">${handleDateCreatedAt(blog.created_at)}</p>
                                <p class="name-text text-light mb-0">${blog.title}</p>
                            </div>
                        </a>
                        `
                    }
                })
                blogWrap1.innerHTML = html.join('');

                if (blogSection[blogSection.length - 1]) {
                    const blog = blogSection[blogSection.length - 1];
                    blogWrap2.innerHTML = `
                    <a href="/blogs/${blog.slug}" class="blog-item">
                        <div class="blog-item_img">
                            <img src="{{ asset('../../uploads/blogs/blog-image-header/${blog.image}') }}" alt="">
                        </div>
                        <div class="blog-item_content">
                            <p class="time-text text-light mb-0">${handleDateCreatedAt(blog.created_at)}</p>
                            <p class="name-text text-light mb-0">${blog.title}</p>
                        </div>
                    </a>
                    `
                }

            })
            .catch((err) => {
                console.log(err);
            })
    </script>
@endpush
