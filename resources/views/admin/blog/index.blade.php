@extends('layouts.admin')
@section('content')
    <div class="col-md-12">

        @include('layouts.includes.alert.alert_message')

        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Blog List
                </div>
                @if (route('admin.search') == request()->url())
                    <a href="{{ url('admin/cars/') }}" class="btn btn-danger fw-bold float-right ml-3">
                        <i class="fa-solid fa-arrow-left"></i>
                        BACK
                    </a>
                @else
                    <a class="btn btn-success fw-bold float-right" href="{{ route('blogs.create') }}">
                        <i class="fa-solid fa-plus"></i>
                        Add New Blog
                    </a>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-dark fw-bold">
                    <thead>
                        <tr class="text-dark">
                            <th>ID</th>
                            <th style="width: 30%;">Title</th>
                            <th style="width: 30%;">Slug</th>
                            <th>Status</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="body-table">
                        @forelse($blogs as $blog)
                            <tr>
                                <td class="text-center">{{ $blog->blog_id }}</td>
                                <td class="text-center">{{ $blog->title }}</td>
                                <td class="text-center">{{ $blog->slug }}</td>
                                <td class="text-center">{{ $blog->status == '1' ? 'Publish' : 'Unpublish' }}</td>
                                <td class="text-center">{{ $blog->created_at }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item mb-3 fs-6 text-primary bg-white"
                                                    href="{{ route('blogs.edit', $blog->blog_id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </li>
                                            <button type="button" class="dropdown-item fs-6 text-danger bg-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteBlogModal{{ $blog->blog_id }}">
                                                <i class="fa-solid fa-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="deleteBlogModal{{ $blog->blog_id }}" tabindex="-1"
                                aria-labelledby="deleteBlogModalLabel{{ $blog->blog_id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteBlogModalLabel{{ $blog->blog_id }}">
                                                Delete
                                                Confirmation</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>
                                                Are you sure, you want to delete this blog ?
                                            </strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('blogs.destroy', $blog->blog_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6">No Blog Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
