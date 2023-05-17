@extends('layouts.admin')

@section('content')
    <div>
        <div class="d-inline-block ">
            <a href="{{ url('admin/users') }}" class="btn btn-danger fw-bold float-right ">
                <i class="fa-solid fa-arrow-left"></i>
                BACK
            </a>
        </div>

        <div class="view-container w-100 bg-dark-subtle d-flex rounded">
            <div class="view-left w-50 d-flex">
                <div class="image">
                    <img src="/admin/img/pexels-eberhard-grossgasteiger-1367192.jpg" alt="avatar" class="rounded-circle"
                        width="200px" height="200px">
                    <div class="fw-bolder text-center mt-4">
                        <div class="d-inline-block mr-2">Role As</div>
                        <span
                            class="{{ $user->role_as == '1' ? 'text-danger' : 'text-success' }}">{{ $user->role_as == '1' ? 'Admin' : 'User' }}</span>
                    </div>
                </div>
                <div class="view-user-info w-75">
                    <div class="view-user-title border-bottom border-success d-inline-block mb-4    ">
                        <h3 class="mb-0">User Info</h3>
                    </div>
                    <div class="row">
                        <div class="info-title">
                            <ul>
                                <li class="text-end fw-bolder mb-4">Username</li>
                                <li class="text-end fw-bolder mb-4">Email</li>
                                <li class="text-end fw-bolder mb-4">Phone</li>
                                <li class="text-end fw-bolder mb-4">Address</li>
                            </ul>
                        </div>
                        <div class="info w-75">
                            <ul>
                                <li class="mb-4">{{ $user->username }}</li>
                                <li class="mb-4">{{ $user->email }}</li>
                                <li class="mb-4">{{ $user->phone }}</li>
                                <li class="mb-4">{{ $user->address }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-secondary view-border"></div>
            <div class="view-right w-50">
                <div class="view-user-title border-bottom border-success d-inline-block mb-4    ">
                    <h3 class="mb-0">Car Rental Info</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
