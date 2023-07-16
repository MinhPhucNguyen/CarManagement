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
                    <a class="btn btn-success fw-bold float-right" href="{{route('blogs.create')}}">
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
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="body-table">
                        @foreach ($blogs as $blog)
                        <tr>
                            <td class="text-center">{{ $blog->blog_id }}</td>
                            <td class="text-center">{{ $blog->title }}</td>
                            <td class="text-center">{{ $blog->slug }}</td>
                            <td class="text-center">{{ $blog->created_at }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item mb-3 fs-6 text-primary bg-white" href="">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                <span>Edit</span>
                                            </a>
                                        </li>
                                        <button type="button" class="dropdown-item fs-6 text-danger bg-white"
                                            data-bs-toggle="modal" data-bs-target="#deleteCarModal">
                                            <i class="fa-solid fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
