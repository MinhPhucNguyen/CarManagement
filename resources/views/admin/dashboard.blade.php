@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800 fw-bold">Dashboard</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-sharp fa-solid fa-circle-check"></i>
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    style="padding: 1.05rem 1rem"></button>
            </div>
        @endif

        <div class="row mt-4">
            <div class="  mr-3 bg-success bg-gradient rounded-4" style="height: 220px; width: 378px;" >
                <a href="{{ url('admin/users') }}" class="dashboard-card h-100 d-block text-decoration-none ">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center text-white flex-column fw-bolder"
                        style="font-size: 60px;">
                        <i class="fa-solid fa-users"></i>
                        <h5 class="mt-3">Users: {{ $userNumber }}</h5>
                    </div>
                </a>
            </div>

            <div class="mr-3 bg-success bg-gradient rounded-4" style="height: 220px; width: 378px;">
                <a href="{{ url('admin/users') }}" class=" dashboard-card h-100 d-block text-decoration-none ">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center text-white flex-column"
                        style="font-size: 60px;">
                        <i class="fa-solid fa-car"></i>
                        <h5 class="mt-3">Cars: {{ $userNumber }}</h5>
                    </div>
                </a>
            </div>

            <div class="mr-3 bg-success bg-gradient rounded-4" style="height: 220px; width: 378px;">
                <a href="{{ url('admin/users') }}" class=" dashboard-card h-100 d-block text-decoration-none ">
                    <div class="h-100 w-100 d-flex justify-content-center align-items-center text-white flex-column"
                        style="font-size: 60px;">
                        <i class="fa-solid fa-file"></i>
                        <h5 class="mt-3">Users: {{ $userNumber }}</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
