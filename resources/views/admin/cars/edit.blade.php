@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Edit Car
                </div>
                <a href="{{ url('admin/cars') }}" class="btn btn-danger fw-bold float-right ">
                    <i class="fa-solid fa-arrow-left"></i>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/cars/' . $car->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="carName" class="form-control"
                                value="{{ $car->carName }}"
                            >
                            {{-- @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">CarLicensePlate</label>
                            <input type="text" name="CarLicensePlate" class="form-control"
                                value="{{ $car->CarLicensePlate }}"
                            >
                            {{-- @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Color</label>
                            <input type="text" name="color" class="form-control"
                                value="{{ $car->color }}"
                            >
                            {{-- @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control"
                                value="{{ $car->price }}">
                            {{-- @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Image</label>
                            <input type="file" name="image" class="form-control"
                                value="{{ $car->image }}">
                            {{-- @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div>
                            <button name="create_btn" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
