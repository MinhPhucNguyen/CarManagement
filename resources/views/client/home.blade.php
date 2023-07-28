@extends('layouts.app')

@section('content')
    @include('layouts.includes.client.banner')

    @include('layouts.includes.client.slider')

    <div id="car-for-you-section">
        <div class="section-container">
            <p class="section-title">
               Xe dành cho bạn
            </p>
            <div class="car-list">
            </div>
        </div>
    </div>

    @include('layouts.includes.client.slider_featured_places')

    @include('layouts.includes.client.advantages-section')

    @include('layouts.includes.client.service-section')

    @include('layouts.includes.client.explorer-section')

    @include('layouts.includes.client.blog-section')
@endsection

@push('app-scripts')
    <script>
        const getRandomCars = async () => {
            let response = await fetch("http://127.0.0.1:8000/api/v2/cars/randomCars");
            let data = await response.json();
            return data;
        }

        const getImageUrl = (item) => {
            if (item.carImages.length > 0) {
                return `{{ asset('${item.carImages[0]}') }}`;
            }
            return "{{ asset('../../image/car/car_image_test.jpg') }}";
        }

        getRandomCars()
            .then((response) => {
                const carList = document.querySelector('.car-list');
                const carItemHTML = response.data.map((item) => {
                    const carSlug = (item.brand + '-' + item.carOriginalName + '-' + item.yearOfCar).toLowerCase();
                    return `<a href="{{url('/car/${carSlug}/${item.carId}')}}" class="car-item">
                    <div class="card">
                        <img src="${getImageUrl(item)}" class="card-img-top" alt="car_image">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <p class="card-text_transmission">${item.transmission == 0 ? 'Số tự động' : 'Số sàn'}</p>
                            </div>
                            <h5 class="card-title text-uppercase">${item.carCustomName} <i class="fa-solid fa-shield"></i></h5>
                            <p class="info">
                                <i class="fa-solid fa-suitcase-rolling"></i>
                                <span>${item.numberOfTrip} trip</span>
                            </p>
                            <div class="car-item-divider"></div>
                            <div class="desc-address-price d-flex justify-content-between align-items-center mt-3">
                                <div class="desc-address">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>${item.location}</span>
                                </div>
                                <div class="desc-price">
                                    ${item.price}K</div>
                            </div>
                        </div>
                    </div>
                </div>`;
                });
                carList.innerHTML = carItemHTML.join('');
            })
            .catch((err) => {
                alert(err)
            });
    </script>
@endpush
