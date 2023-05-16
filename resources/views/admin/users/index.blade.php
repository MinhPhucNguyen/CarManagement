@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-sharp fa-solid fa-circle-check"></i>
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

                {{-- Filter Role As --}}
                <form action="{{ url('admin/users') }}" method="GET" class="w-25 m-0">
                    <div class="mb-3 d-flex w-100 align-items-center">
                        <div class="d-flex align-items-center w-25">
                            <label for="filterBy" class="form-label mb-0 fw-bolder">Filter by:</label>
                        </div>
                        <select name="filterBy" id="filter-by" class="form-select w-75">
                            <option value="">All</option>
                            <option value='0' {{ request('filterBy') == '0' ? 'selected' : '' }}>Role as User</option>
                            <option value='1' {{ request('filterBy') == '1' ? 'selected' : '' }}>Role as Admin</option>
                            <option value='desc' {{ request('filterBy') == 'desc' ? 'selected' : '' }}>Descending by ID
                            </option>
                        </select>
                    </div>
                </form>
                {{-- End Filter Role As --}}

                <table class="table table-bordered table-striped text-dark fw-bold">
                    <thead>
                        <tr class="text-dark">
                            <td>ID</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Role as</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="body-table">
                        @forelse ($usersList as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="#">{{ $user->username }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>

                                <td class="{{ $user->role_as == '1' ? 'text-danger fw-bold' : '' }}">
                                    {{ $user->role_as == '1' ? 'Admin' : 'User' }}</td>

                                <td class="{{ $user->status == '1' ? 'text-success fw-bold' : '' }}">
                                    <i class="fa-solid fa-circle-dot" style="font-size: 14px"></i>
                                    {{ $user->status == '1' ? 'Active' : 'Inactive' }}
                                </td>

                                <td class="d-flex">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item mb-2"
                                                    href="{{ url('admin/users/' . $user->id . '/edit') }}"> <i
                                                        class="fa-solid fa-pen-to-square"></i>
                                                    <span>Edit</span></a></li>
                                            <li>
                                                <form action="{{ url('admin/users/' . $user->id . '/delete') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="submit" class="dropdown-item">
                                                        <i class="fa-solid fa-trash"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No User Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination">
                    {!! $usersList->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
