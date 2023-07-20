@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Create New Blog
                </div>
                <a href="{{ route('blogs.index') }}" class="btn btn-danger fw-bold float-right ">
                    <i class="fa-solid fa-arrow-left"></i>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="fw-bold">Title</label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid  @enderror"
                                placeholder="Enter title" value="{{ !$errors->has('title') ? old('title') : '' }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="fw-bold">Slug</label>
                            <input type="text" name="slug" class="form-control  @error('slug') is-invalid  @enderror"
                                placeholder="Enter slug" value="{{ !$errors->has('slug') ? old('slug') : '' }}">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="fw-bold">Image</label>
                            <input type="file" name="image" class="blog-image-input form-control">
                            <div class="blog-image-container">
                                <i class="fa-solid fa-image fs-2"></i>
                            </div>
                        </div>
                        <div class="form-group mt-4  col-md-6">
                            <label class="fw-bold mr-2">Publish</label>
                            <input type="checkbox" name="status" {{ old('status') ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="form-group border-dark border-top mt-4">
                        <label class="mt-4 fw-bold">Blog Content</label>
                        <textarea name="content" id="blog-content">{{ !$errors->has('content') ? old('content') : '' }}</textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="create-btn">
                        <button type="submit" class="btn btn-success fw-bold">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const blogImageContainer = document.querySelector('.blog-image-container');
        const blogImageInput = document.querySelector('.blog-image-input');
        const blogImageIcon = document.querySelector('.blog-image-container i');

        blogImageContainer.addEventListener('click', function() {
            blogImageInput.click();
        })

        blogImageInput.addEventListener('change', function() {
            const file = this.files[0];
            const imageURL = URL.createObjectURL(file);

            // Check if image exsist\
            if (blogImageContainer.querySelector('img')) {
                blogImageContainer.querySelector('img').remove();
            }

            const image = new Image();
            image.classList.add('blog-image');
            image.src = imageURL;
            blogImageContainer.appendChild(image);
            blogImageIcon.style.display = 'none';
        })
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#blog-content'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                },
                fileTools_requestHeaders: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
