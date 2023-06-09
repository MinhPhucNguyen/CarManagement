@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        @include('layouts.includes.alert.alert_message')
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Edit Car Information
                </div>
                <a href="{{ route('cars.index') }}" class="btn btn-danger fw-bold float-right ">
                    <i class="fa-solid fa-arrow-left"></i>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.update', $car->car_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                data-bs-target="#image-tab-pane" type="button" role="tab"
                                aria-controls="image-tab-pane" aria-selected="false">
                                <i class="fa-solid fa-image mr-1"></i>
                                Car Images</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        {{-- Tab Add Car Detail --}}
                        <div class="tab-pane fade show mt-3 active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">

                            <div class="row">
                                <div class="col-md-12 mb-3 ">
                                    <label for="car_name">Car Name</label>
                                    <input type="text" name="car_name"
                                        class="form-control @error('car_name') is-invalid  @enderror"
                                        value="{{ $car->car_name }}">
                                    @error('car_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="brand">Brand</label>
                                    <select name="brand" class="form-control @error('brand') is-invalid  @enderror"">
                                        <option value="">--Select Brand--</option>
                                        @foreach ($brands as $brand)
                                            <option {{ $brand->brand_id == $car->brand_id ? 'selected' : '' }}
                                                value="{{ $brand->brand_id }}">{{ Str::upper($brand->brand_name) }}
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
                                        class="form-control @error('year') is-invalid  @enderror"
                                        value="{{ $car->year }}">
                                    @error('year')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="price">Price</label>
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid  @enderror"
                                        value="{{ $car->price }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" rows="3"
                                        class="form-control @error('description') is-invalid  @enderror">{{ $car->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="seats">Seats</label>
                                    <input type="text" name="seats"
                                        class="form-control @error('seats') is-invalid  @enderror"
                                        value="{{ $car->seats }}">
                                    @error('seats')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="fuel">Fuel</label>
                                    <select name="fuel" class="form-control  @error('fuel') is-invalid  @enderror">
                                        <option value="">--Select Type Of Fuel-- </option>
                                        <option {{ $car->fuel == 'Petrol' ? 'selected' : '' }} value="Petrol">Petrol
                                        </option>
                                        <option {{ $car->fuel == 'Diesel' ? 'selected' : '' }} value="Diesel">Diesel
                                        </option>
                                    </select>
                                    @error('fuel')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="speed">Speed (Km/h)</label>
                                    <input type="text" name="speed"
                                        class="form-control @error('speed') is-invalid  @enderror"
                                        value="{{ $car->speed }}">
                                    @error('speed')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="capacity">Capacity (cc)</label>
                                    <input type="text" name="capacity"
                                        class="form-control @error('capacity') is-invalid  @enderror"
                                        value="{{ $car->capacity }}">
                                    @error('capacity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Tab Add Car Images --}}
                        <div class="tab-pane fade mt-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="image">Upload Car Images</label>
                                    <input type="file" multiple name="image[]"
                                        class="form-control @error('image') is-invalid  @enderror"
                                        value="{{ !$errors->has('image') ? old('image') : '' }}">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div>
                                        @if ($car->carImages)
                                            @foreach ($car->carImages as $image)
                                                <div class="car_image_input">
                                                    <img class="image_input" src="{{ asset($image->image) }}"
                                                        alt="">
                                                    <a href="{{ route('destroyImage', $image->image_id, '/delete') }}"
                                                        class="btn btn-danger remove_btn">Remove</a>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if (count($car->carImages) == 0)
                                            {{--  count() đếm số phần tử trong mảng  --}}
                                            <h6 class="mt-4 text-warning fw-bolder">No Image Added</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success pl-4 pr-4 fw-bold mt-3" type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
