@extends('layouts.app')

@section('content')
    <div id="about">
        <div class="about-head">
            <div class="about-container">
                <h1>
                    CA<span style="color: #1cc88a">R</span>ENTAL - With you on every journeys
                </h1>
                <div class="about-head_desc">
                    <p>Carental was founded with the mission to bring a modern technology platform that connects car owners
                        and passengers in the fastest, safest and most economical way.</p>
                    <p>Carental aims to build a civilized car sharing community with many utilities through mobile
                        applications, in order to improve the quality of life of the community.</p>
                </div>
            </div>
        </div>

        <div class="about-img">
            <div class="about-container">
                <div class="img">
                    <img src="{{ asset('../../image/about/about.png') }}" alt="">
                </div>
            </div>
        </div>

        <div class="about-advantage">
            <div class="about-container">
                <div class="about-advantage-container w-100">
                    <h2>THE ADVANTAGES OF CARENTAL</h2>
                    <div class="list-adv">
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv4.png') }}" alt="">
                            <p>Book a car with 1 Click</p>
                        </div>
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv3.png') }}" alt="">
                            <p>More than 100 car models</p>
                        </div>
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv2.png') }}" alt="">
                            <p>Carental has been present in most of the districts and major cities</p>
                        </div>
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv1.png') }}" alt="">
                            <p>10% cheaper than traditional car</p>
                        </div>
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv5.png') }}" alt="">
                            <p>Income 10-15 million/month</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-salient-features">
            <div class="about-container">
                <div class="w-100 d-flex">
                    <h1>SALIENT FEATURES AVAILABLE AT CA<span style="color: #1cc88a">R</span>ENTAL</h1>
                    <div class="salient-features-list">
                        <div class="salient-features-item">
                            <a class="w-100" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Calendar feature
                                <i class="fa-solid fa-plus float-end"></i>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body mt-0 border-0">
                                    Support car owners to conveniently manage and track vehicle schedules in a scientific
                                    way and take the initiative in setting and adjusting car rental prices. Allow tenants to
                                    preview the car schedule and receive a daily car rental quote.

                                    Therefore, the Calendar feature will completely eliminate the phone contact between the
                                    car owner and the tenant in the exchange of time and car rental price, thereby
                                    significantly shortening the booking time.
                                </div>
                            </div>
                        </div>
                        <div class="salient-features-item">
                            <a class="w-100" data-bs-toggle="collapse" href="#collapseExample1" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Book a car quickly and deliver the car to your place
                                <i class="fa-solid fa-plus float-end"></i>
                            </a>
                            <div class="collapse" id="collapseExample1">
                                <div class="card card-body mt-0 border-0">
                                    You do not have much time, you want to rent a car quickly without going through the
                                    online review step of the car owner? Do you want the car to be delivered to your
                                    doorstep or pick you up directly at the airport? Mioto's "Quick Order" and "Delivery"
                                    feature will perfectly meet these requirements of yours.

                                    At Mioto, we have a long list of car owners who are willing to provide door-to-door
                                    delivery and allow you to rent a car without online approval (just check in person upon
                                    handover).
                                </div>
                            </div>
                        </div>
                        <div class="salient-features-item">
                            <a class="w-100" data-bs-toggle="collapse" href="#collapseExample2" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                GPS all the way
                                <i class="fa-solid fa-plus float-end"></i>
                            </a>
                            <div class="collapse" id="collapseExample2">
                                <div class="card card-body mt-0 border-0">
                                    Mioto knows that your car is your big asset, and the self-driving car rental business
                                    will always be risky. Therefore, in addition to assisting you with the pre-verification
                                    of important personal information of customers (Driver's License, ID card, KT3 household
                                    registration book/temporary residence permit and rating score), we are developing
                                    develop more built-in GPS features directly on the application.

                                    With the GPS feature, car owners can easily track the status and location of their
                                    vehicle right on the app, anytime and anywhere so you can have complete peace of mind
                                    about your vehicle.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const pushIcons = document.querySelectorAll('.fa-plus');
        const salientFeaturesItems = document.querySelectorAll('.salient-features-item a');
        salientFeaturesItems.forEach(item => {
            item.addEventListener('click', function(){
                pushIcons.forEach(icon => {
                    if(icon.parentElement == item && icon.classList.contains('fa-plus')){
                        item.style.color = "#1cc88a";
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus')
                    }
                    else if (icon.parentElement == item && icon.classList.contains('fa-minus')){
                        item.style.color = "black";
                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus')
                    }
                })
            })
        })
    </script>
@endpush
