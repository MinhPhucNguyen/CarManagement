@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    style="padding: 1.05rem 1rem"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="fw-bold text-white d-inline-block">Users List</h3>
                <a href="{{ url('admin/users/create') }}" class="btn btn-success fw-bold float-right ">
                    <i class="fa-solid fa-plus"></i>
                    Add New User
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-dark fw-bold">
                    <thead>
                        <tr class="text-dark">
                            <td>ID</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Role as</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usersList as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td class="{{ $user->role_as == '1' ? 'text-danger fw-bold' : '' }}">
                                    {{ $user->role_as == '1' ? 'Admin' : 'User' }}</td>
                                <td>
                                    <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Edit</span>
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                        <span>Delete</span>
                                    </a>

                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="6">No User Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
