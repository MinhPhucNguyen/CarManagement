@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
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
                <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                        value="{{ !$errors->has('car_name') ? old('car_name') : '' }}">
                                    @error('car_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="brand">Brand</label>
                                    <select name="brand" class="form-control @error('brand') is-invalid  @enderror"">
                                        <option value="">--Select Brand--</option>
                                        @foreach ($brands as $brand)
                                            @if ($brand->status == '0')
                                                <option value="{{ $brand->brand_id }}">{{ Str::upper($brand->brand_name) }}
                                                </option>
                                            @endif
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
                                        value="{{ !$errors->has('year') ? old('year') : '' }}">
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
                                    <textarea type="text" name="description" rows="3"
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
                                    <select name="fuel" class="form-control  @error('fuel') is-invalid  @enderror">
                                        <option value="">--Select Type Of Fuel-- </option>
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                    </select>
                                    @error('fuel')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="speed">Speed (Km/h)</label>
                                    <input type="text" name="speed"
                                        class="form-control @error('speed') is-invalid  @enderror"
                                        value="{{ !$errors->has('speed') ? old('speed') : '' }}">
                                    @error('speed')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="capacity">Capacity (cc)</label>
                                    <input type="text" name="capacity"
                                        class="form-control @error('capacity') is-invalid  @enderror"
                                        value="{{ !$errors->has('capacity') ? old('capacity') : '' }}">
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
                                        class="form-control file-input @error('image') is-invalid  @enderror">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="display_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success pl-4 pr-4 fw-bold" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //Handle display image when input
        const fileInput = document.querySelector(".file-input");
        const displayImage = document.querySelector(".display_image");

        fileInput.addEventListener("change", function() {
            // console.log(fileInput.files);
            for (const file of fileInput.files) {
                const imageURL = URL.createObjectURL(file);
                const imageItem = document.createElement("div");
                const img = document.createElement("img");
                const removeBtn = document.createElement("button");

                imageItem.classList.add("car_image_input");
                removeBtn.classList.add("remove_btn", "btn", "btn-danger");
                removeBtn.textContent = "Remove";
                removeBtn.type = "button";

                img.src = imageURL;
                img.classList.add("image_input");

                // thêm ảnh và nút xóa vào thẻ imageItem,
                imageItem.appendChild(img);
                imageItem.appendChild(removeBtn);
                displayImage.appendChild(imageItem);

                removeBtn.addEventListener("click", function() {
                    // get index of the file in fileInput.files
                    const index = Array.prototype.indexOf.call(fileInput.files, file);
                    // console.log(index);

                    const newFileList = new DataTransfer(); //new DataTranfer() used to hold the data
                    // console.log(newFileList.files);
                    // console.log(fileInput.files.length);
                    for (let i = 0; i < fileInput.files.length; i++) {
                        if (i !== index) {
                            newFileList.items.add(fileInput.files[
                            i]); //Add new file (not remove) to newFileList
                        }
                    }
                    fileInput.files = newFileList.files;
                    imageItem.remove();
                });
            }
        });
    </script>
@endpush
