@extends('layouts.app')

@section('content')
    <div class="car_detail_container">
        <div class="car_image">
            <div class="main_image">
                <div class="cover_car_image">
                    <img src="{{ asset('../../image/car/car_image_test.jpg') }}" alt="">
                </div>
            </div>
            <div class="sub_image">
                <div class="cover_car_image">
                    <img src="{{ asset('../../image/car/car_image_test.jpg') }}" alt="">
                </div>
                <div class="cover_car_image">
                    <img src="{{ asset('../../image/car/car_image_test.jpg') }}" alt="">
                </div>
                <div class="cover_car_image">
                    <img src="{{ asset('../../image/car/car_image_test.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const testClass = document.querySelector('.car_detail_container');
        const getCar = async () => {
            const car_id = '{{ $car->car_id }}'
            const response = await fetch(`http://127.0.0.1:8000/api/v2/car/detail?car_id=${car_id}`);
            const data = await response.json();
            return data;
        }

        getCar()
            .then((response) => {

            })
            .catch((err) => {
                alert(err);
            })
    </script>
@endpush
