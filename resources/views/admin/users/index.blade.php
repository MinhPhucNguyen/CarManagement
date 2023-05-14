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
                <div class="d-inline-block fw-bold text-white fs-4">
                    Users List
                </div>
                <a href="{{ url('admin/users/create') }}" class="btn btn-success fw-bold float-right ">
                    <i class="fa-solid fa-plus"></i>
                    Add New User
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users') }}" method="GET" class="w-25 m-0">
                    <div class="mb-3 d-flex w-100 align-items-center">
                        <div class="d-flex align-items-center w-25">
                            <label for="role_as" class="form-label mb-0 fw-bolder">Filter by:</label>
                        </div>
                        <select name="role_as" id="role_as" class="form-select w-75">
                            <option value="">All</option>
                            <option value='1' {{ request('role_as') == '1' ? 'selected' : '' }}>Admin</option>
                            <option value='0' {{ request('role_as') == '0' ? 'selected' : '' }}>User</option>
                        </select>
                        <button type="submit" class="btn btn-primary float-end mb-0 w-25 ml-2">Filter</button>

                    </div>
                </form>


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

                                <td class="d-flex">
                                    <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-primary mr-2">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ url('admin/users/' . $user->id . '/delete') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No User Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {!! $usersList->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
