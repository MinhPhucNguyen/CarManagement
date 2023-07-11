@extends('layouts.admin')

@section('content')
    <div class="container-fluid p-1">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-sharp fa-solid fa-circle-check"></i>
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    style="padding: 1.05rem 1rem"></button>
            </div>
        @endif
        
        <!-- Page Heading -->
        <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h4 class="mb-0 text-gray-800 fw-bold">Dashboard</h4>
        </div>
        <div class="row pl-3 mt-2">
            <div class="mr-3 bg-success bg-gradient rounded-4" style="height: 180px; width: 378px;">
                <a href="{{ url('admin/users') }}" class="dashboard-card h-100 d-block text-decoration-none ">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center text-white flex-column fw-bolder"
                        style="font-size: 60px;">
                        <i class="fa-solid fa-users"></i>
                        <h5 class="mt-3 fw-bold">Users: {{ $usersNumber }}</h5>
                    </div>
                </a>
            </div>

            <div class="mr-3 bg-success bg-gradient rounded-4" style="height: 180px; width: 378px;">
                <a href="{{ route('cars.index') }}" class=" dashboard-card h-100 d-block text-decoration-none ">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center text-white flex-column"
                        style="font-size: 60px;">
                        <i class="fa-solid fa-car"></i>
                        <h5 class="mt-3 fw-bold">Cars: {{ $carsNumber }}</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="mt-4 mb-4">
            
        <div class="card">
            <div class="card-header bg-dark d-flex align-items-center">
                <div class="d-inline-block fw-bold text-white fs-4 flex-grow-1">
                    Users List
                </div>
                <div>
                    @if (route('admin.search') == request()->url())
                        <a href="{{ url('admin/users/') }}" class="btn btn-danger fw-bold float-right ml-3">
                            <i class="fa-solid fa-arrow-left"></i>
                            BACK
                        </a>
                    @else
                        <a href="{{ route('users.create') }}" class="btn btn-success fw-bold float-right ml-3">
                            <i class="fa-solid fa-plus"></i>
                            Add New User
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-dark fw-bold">
                    <thead>
                        <tr class="text-dark">
                            <th data-sort="id">
                                ID
                                <span class="sort-id-icon float-end">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <i class="fa-solid fa-arrow-up text-muted "></i>
                                </span>
                            </th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Role as</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="body-table">

                        @forelse ($usersList as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center"><a href="{{ route('users.show', $user->id) }}"
                                        class="text-success">{{ $user->username }}</a></td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->phone }}</td>
                                <td class="text-center">{{ $user->address }}</td>

                                <td class="text-center  {{ $user->role_as == '1' ? 'text-danger fw-bold' : '' }}">
                                    {{ $user->role_as == '1' ? 'Admin' : 'User' }}</td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item mb-3 fs-6 text-success bg-white"
                                                    href="{{ route('users.edit', $user->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </li>
                                            <li>
                                                @if ($user->role_as != '1')
                                                    <button type="button" class="dropdown-item fs-6 text-danger bg-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteConfirmModal{{ $user->id }}">
                                                        <i class="fa-solid fa-trash"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Delete Confirm -->
                            <div class="modal fade" id="deleteConfirmModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="deleteConfirmModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteConfirmModalLabel{{ $user->id }}">
                                                Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this user?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
                                <td colspan="7">No User Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $usersList->links() }}
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

