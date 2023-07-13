@extends('layouts.app')

@section('content')
    @include('layouts.includes.client.banner')

    <div id="car-for-you-section">
        <div class="section-container">
            <p class="section-title">
                Cars for you
            </p>
            <div class="car-list">
                <div class="car-item">
                    <div class="card ">
                        <img src="{{ asset('../../image/car/car_image_test.jpg') }}" class="card-img-top" alt="car_image">
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="card-text_transmission">Auto</p>
                                <p class="card-text_delivery">Delivery</p>
                            </div>
                            <h5 class="card-title">HONDA CITY 2014</h5>
                            <p class="info">
                                <i class="fa-solid fa-suitcase-rolling"></i>
                                <span>53 trip</span>
                            </p>
                            <div class="car-item-divider"></div>
                            <div class="desc-address-price d-flex justify-content-between align-items-center mt-3">
                                <div class="desc-address">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>Hanoi</span>
                                </div>
                                <div class="desc-price">
                                    650K</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
