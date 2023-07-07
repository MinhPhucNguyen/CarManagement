@extends('layouts.admin')

@section('content')
    <div>
        <div class="d-inline-block ">
            <a href="{{ url('admin/users') }}" class="btn btn-danger fw-bold float-right ">
                <i class="fa-solid fa-arrow-left"></i>
                BACK
            </a>
        </div>

        <div class="view-container w-100 shadow d-flex  justify-content-between rounded">
            <div class="view-left">
                ádasdsads
            </div>
            <div class="border bg-body-secondary view-border rounded-5"></div>

            <div class="view-right-container d-flex flex-column">
                <div class="view-right-item rounded-3 border d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="image-avatar">
                            <img src="{{ asset('uploads/avatar/default.jpg') }}" alt="avatar" class="rounded-circle">
                        </div>
                        <div class="info">
                            <p class="fs-4 fw-bolder text-dark mb-1"> {{ $user->username }}</p>
                            <p class="fw-bolder mb-1 {{ $user->role_as == '1' ? 'text-danger' : 'text-success' }}">
                                {{ $user->role_as == '1' ? 'Admin' : 'User' }}</p>
                            <p class="fs-5 fw-bolder text-secondary"> {{ $user->address }}</p>
                        </div>
                    </div>
                    <div class="edit-user-btn d-flex align-items-center">
                        <a href="{{ route('users.edit', $user->id) }}" class="edit-btn-in-view bg-transparent fw-bold mr-4">
                            <span class="mr-2">Edit</span>
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </div>
                </div>
                <div class="view-right-item rounded-3 border d-flex justify-content-between mt-4 mb-4">
                    <div class="d-flex">
                        <div class="image-avatar">
                            <img src="{{ asset('uploads/avatar/default.jpg') }}" alt="avatar" class="rounded-circle">
                        </div>
                        <div class="info">
                            <p class="fs-4 fw-bolder text-dark mb-1"> {{ $user->username }}</p>
                            <p class="fw-bolder mb-1 {{ $user->role_as == '1' ? 'text-danger' : 'text-success' }}">
                                {{ $user->role_as == '1' ? 'Admin' : 'User' }}</p>
                            <p class="fs-5 fw-bolder text-secondary"> {{ $user->address }}</p>
                        </div>
                    </div>
                    <div class="edit-user-btn d-flex align-items-center">
                        <a href="{{ route('users.edit', $user->id) }}"
                            class="edit-btn-in-view bg-transparent fw-bold mr-4">
                            <span class="mr-2">Edit</span>
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </div>
                </div>
                <div class="view-right-item rounded-3 border d-flex justify-content-between mt-4">
                    <div class="d-flex">
                        <div class="image-avatar">
                            <img src="{{ asset('uploads/avatar/default.jpg') }}" alt="avatar" class="rounded-circle">
                        </div>
                        <div class="info">
                            <p class="fs-4 fw-bolder text-dark mb-1"> {{ $user->username }}</p>
                            <p class="fw-bolder mb-1 {{ $user->role_as == '1' ? 'text-danger' : 'text-success' }}">
                                {{ $user->role_as == '1' ? 'Admin' : 'User' }}</p>
                            <p class="fs-5 fw-bolder text-secondary"> {{ $user->address }}</p>
                        </div>
                    </div>
                    <div class="edit-user-btn d-flex align-items-center">
                        <a href="{{ route('users.edit', $user->id) }}"
                            class="edit-btn-in-view bg-transparent fw-bold mr-4">
                            <span class="mr-2">Edit</span>
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- @if ($user->role_as == '0')
                <div class="view-right w-50">
                    <div class="view-user-title border-bottom border-success d-inline-block mb-4    ">
                        <h3 class="mb-0">Car Rental Info</h3>
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
@endsection
