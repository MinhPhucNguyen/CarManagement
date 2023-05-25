@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="card">
                <div class="card-header bg-dark">
                    <div class="d-inline-block fw-bold text-white fs-4">
                        Create New User
                    </div>
                    <a href="{{ url('admin/cars') }}" class="btn btn-danger fw-bold float-right ">
                        <i class="fa-solid fa-arrow-left"></i>
                        BACK
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/cars') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="carName"
                                >
                                {{-- @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">CarLicensePlate</label>
                                <input type="text" name="CarLicensePlate"
                                >
                                {{-- @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">color</label>
                                <input type="text" name="color"
                                >
                                {{-- @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="price"
                                    >
                                {{-- @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image"
                                >
                                {{-- @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror --}}
                            </div>
                            <div>
                                <button name="create_btn" class="btn btn-success">Create Car</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
