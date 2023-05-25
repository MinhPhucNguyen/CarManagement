@extends('layouts.admin')

@section('content')
    <div>
        <div class="d-inline-block ">
            <a href="" class="btn btn-danger fw-bold float-right ">
                <i class="fa-solid fa-arrow-left"></i>
                BACK
            </a>
        </div>

        <div class="view-container w-100 bg-dark-subtle d-flex rounded">
            <div class="view-left w-50 d-flex">
                <div class="image w-25">
                    <img src="/admin/img/pexels-eberhard-grossgasteiger-1367192.jpg" alt="avatar" class="rounded-circle"
                        width="200px" height="200px">
                    {{-- <div class="fw-bolder text-center mt-4">
                        <div class="d-inline-block mr-2">Role As</div>
                        <span
                            class="{{   $user->role_as == '1' ? 'text-danger' : 'text-success' }}">{{ $user->role_as == '1' ? 'Admin' : 'User' }}</span>
                    </div> --}}
                </div>
                <div class="view-user-info w-75">
                    <div class="view-user-title border-bottom border-success d-inline-block mb-4    ">
                        <h3 class="mb-0">Car Info</h3>
                    </div>
                    <div class="row">
                        <div class="info-title">
                            <ul>
                                <li class="text-end fw-bolder mb-4">Name</li>
                                <li class="text-end fw-bolder mb-4">Price</li>
                                <li class="text-end fw-bolder mb-4">Image</li>
                            </ul>
                        </div>
                        <div class="info w-75">
                            <ul>
                                <li class="mb-4">{{ $car->name }}</li>
                                <li class="mb-4">{{ $car->price }}</li>
                                <li class="mb-4">{{ $car->image }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-secondary view-border"></div>
            <div class="view-right w-50">
                <div class="view-user-title border-bottom border-success d-inline-block mb-4    ">
                    <h3 class="mb-0">User Rental Info</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
