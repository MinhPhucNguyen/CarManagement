@extends('layouts.admin')

@section('content')
    <div class="col-md-12 mb-4">

        @include('layouts.includes.alert.alert_message')

        <div class="card">
            <div class="card-header bg-dark d-flex align-items-center">
                <div class="d-inline-block fw-bold text-white fs-4 flex-grow-1">
                    Users List
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-success fw-bold float-right ml-3">
                        <i class="fa-solid fa-plus"></i>
                        Add New User
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{-- Filter Role As --}}
                <form action="" method="GET" class="w-25 m-0">
                    <div class="mb-3 w-100 align-items-center">
                        <div class="d-flex align-items-center w-50">
                            <label for="filterBy" class="form-label mb-0 fw-bolder">Filter by Role As:</label>
                        </div>
                        <select name="filterBy" class="form-select w-50 mt-2 filter-by ">
                            <option value="all">All</option>
                            <option value='0' {{ request('filterBy') == '0' ? 'selected' : '' }}>User</option>
                            <option value='1' {{ request('filterBy') == '1' ? 'selected' : '' }}>Admin</option>
                            </option>
                        </select>
                    </div>
                </form>
                {{-- End Filter Role As --}}

                <table class="table table-bordered table-striped text-dark fw-bold">
                    <thead>
                        <tr class="text-dark">
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Role as</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="body-table">

                        @forelse ($usersList as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ route('users.show', $user->id) }}"
                                        class="text-success">{{ $user->username }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>

                                <td class="{{ $user->role_as == '1' ? 'text-danger fw-bold' : '' }}">
                                    {{ $user->role_as == '1' ? 'Admin' : 'User' }}</td>

                                <td class="d-flex">
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
@endsection
