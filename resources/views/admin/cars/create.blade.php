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
                                data-bs-target="#car-tab-pane" type="button" role="tab" aria-controls="car-tab-pane"
                                aria-selected="true">
                                <i class="fa-solid fa-circle-info mr-1"></i>
                                Car Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-success fw-bold" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#feature-tab-pane" type="button" role="tab"
                                aria-controls="feature-tab-pane" aria-selected="false">
                                <i class="fa-solid fa-list"></i>
                                Features</button>
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
                        <div class="tab-pane fade show mt-3 active" id="car-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
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
                                <div class="col-md-4 mb-3 ">
                                    <label for="car_name">Car Name</label>
                                    <input type="text" name="car_name"
                                        class="form-control @error('car_name') is-invalid  @enderror"
                                        value="{{ !$errors->has('car_name') ? old('car_name') : '' }}">
                                    @error('car_name')
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
                                <div class="col-md-4 mb-3">
                                    <label for="status">Status</label>
                                    <div>
                                        <input type="checkbox" name="status" value="1">
                                        <label for="status">Visibility</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="delivery_enable">Delivery</label>
                                    <div>
                                        <input type="checkbox" name="delivery_enable" value="1">
                                        <label for="delivery_enable">Enable</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" rows="3" id="car-description"
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
                                    <label for="fuel_consumption">Fuel Consumption (/100km)</label>
                                    <input type="text" name="fuel_consumption"
                                        class="form-control @error('fuel_consumption') is-invalid  @enderror"
                                        value="{{ !$errors->has('fuel_consumption') ? old('fuel_consumption') : '' }}">
                                    @error('fuel_consumption')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="transmission">Transmission</label>
                                    <select name="transmission"
                                        class="form-control  @error('transmission') is-invalid  @enderror">
                                        <option value="">--Select Transmission-- </option>
                                        <option value="0">Automatic</option>
                                        <option value="1">Manual</option>
                                    </select>
                                    @error('transmission')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="trip">Number of trip</label>
                                    <input type="text" name="trip"
                                        class="form-control @error('trip') is-invalid  @enderror"
                                        value="{{ !$errors->has('trip') ? old('trip') : '' }}">
                                    @error('trip')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="location">Location</label>
                                    <input type="text" name="location"
                                        class="form-control @error('location') is-invalid  @enderror"
                                        value="{{ !$errors->has('location') ? old('location') : '' }}">
                                    @error('location')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Tab Add Car Feature --}}
                        <div class="tab-pane fade mt-3" id="feature-tab-pane" role="tabpanel"
                            aria-labelledby="image-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h5 class="mb-4">Features</h5>
                                    <div class="features-list">
                                        @foreach ($features as $feature)
                                            <div id="{{ $feature->id }}" name="features" class="feature-item">
                                                {{ $feature->name }}</div>
                                        @endforeach
                                        <input type="hidden" name="featureIds" class="featuresChose">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tab Add Car Images --}}
                        <div class="tab-pane fade mt-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h5 class="mb-4">Upload Car Images</h5>
                                    <input type="file" multiple name="image[]"
                                        class="form-control file-input @error('image') is-invalid  @enderror">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="display_image mb-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success pl-4 pr-4 fw-bold" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const featureItem = document.querySelectorAll(".feature-item");
        const featuresChoseInput = document.querySelector(".featuresChose");
        const featuresChose = [];
        featureItem.forEach((item) => {
            item.addEventListener('click', function() {
                item.classList.toggle('feature-chose');

                const featureId = item.getAttribute('id');
                // console.log(featureId);
                if (item.classList.contains('feature-chose')) {
                    featuresChose.push(featureId); //thêm featureId vào featuresChose
                } else {
                    const index = featuresChose.indexOf(featureId); //tìm index của feature đã thêm vào featuresChose
                    featuresChose.splice(index, 1); //xóa feature đó khỏi featuresChose
                }
                // console.log(featuresChose);
                featuresChoseInput.value = featuresChose.join(','); //thêm các featureId đã chọn vào input
            })
        })
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#car-description'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                },
                fileTools_requestHeaders: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

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
