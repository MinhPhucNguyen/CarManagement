@extends('layouts.admin')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Create New Car
                </div>
                <a href="{{ route('cars.index') }}" class="btn btn-danger fw-bold float-right ">
                    <i class="fa-solid fa-arrow-left"></i>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-success fw-bold active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">
                            <i class="fa-solid fa-circle-info mr-1"></i>
                            Car Detail  
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-success fw-bold" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false">
                            <i class="fa-solid fa-image mr-1"></i>
                            Car Images</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show mt-3 active" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        <form action="{{ url('admin/users') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3 ">
                                    <label for="car_name">Car Name</label>
                                    <input type="text" name="car_name"
                                        class="form-control @error('car_name') is-invalid  @enderror"
                                        value="{{ !$errors->has('car_name') ? old('car_name') : '' }}">
                                    @error('car_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="brand">Brand</label>
                                    <select name="brand" class="form-control">
                                        <option value="">--Select Brand--</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->brand_id }}">{{ Str::upper($brand->brand_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="year">Year</label>
                                    <input type="text" name="year"
                                        class="form-control @error('year') is-invalid  @enderror">
                                    @error('year')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="price">Price</label>
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid  @enderror"
                                        value="{{ !$errors->has('price') ? old('price') : '' }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" rows="5"
                                        class="form-control @error('description') is-invalid  @enderror">{{ !$errors->has('description') ? old('description') : '' }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="seats">Seats</label>
                                    <input type="text" name="seats"
                                        class="form-control @error('seats') is-invalid  @enderror"
                                        value="{{ !$errors->has('seats') ? old('seats') : '' }}">
                                    @error('seats')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="fuel">Fuel</label>
                                    <input type="text" name="fuel"
                                        class="form-control @error('fuel') is-invalid  @enderror"
                                        value="{{ !$errors->has('fuel') ? old('fuel') : '' }}">
                                    @error('fuel')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="speed">Speed</label>
                                    <input type="text" name="speed"
                                        class="form-control @error('speed') is-invalid  @enderror"
                                        value="{{ !$errors->has('speed') ? old('speed') : '' }}">
                                    @error('speed')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="capacity">Capacity</label>
                                    <input type="text" name="capacity"
                                        class="form-control @error('capacity') is-invalid  @enderror"
                                        value="{{ !$errors->has('capacity') ? old('capacity') : '' }}">
                                    @error('capacity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <button name="create_btn" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade mt-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="image">Upload Car Images</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid  @enderror"
                                        value="{{ !$errors->has('image') ? old('image') : '' }}">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="car_image_input mt-3 rounded-4">

                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
