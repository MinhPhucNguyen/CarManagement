<div id="banner-section">
    <div class="banner">
        <div class="banner-title">
            CARENTAL-WITH YOU ON YOUR JOURNEY
        </div>
        <div class="search-option">
            <div class="option d-flex justify-content-center shadow">
                <div class="option-item active">
                    <i class="fa-solid fa-car-side"></i>
                    <span> Self-driving car</span>
                </div>
                <div class="option-item">
                    <i class="fa-solid fa-user"></i>
                    <span>Car with driver</span>
                </div>
            </div>
            <div class="search shadow d-flex">
                <div class="search-form-item address">
                    <div class="search-form-title">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Address</span>
                    </div>
                    <div class="search-form-choose">
                        <input type="text" placeholder="Enter car rental location" class="address-input"
                            value="Hanoi">
                    </div>
                </div>
                <div class="search-form-item_divider"></div>
                <div class="calendar-wrap d-flex">
                    <div class="search-form-item address">
                        <div class="search-form-title">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Start</span>
                        </div>
                        <div class="search-form-choose">
                            <input class="calendar-input">
                        </div>
                    </div>
                    <div class="search-form-item_divider"></div>
                    <div class="search-form-item address">
                        <div class="search-form-title">
                            <i class="fa-regular fa-calendar"></i>
                            <span>End</span>
                        </div>
                        <div class="search-form-choose">
                            <input class="calendar-input">
                        </div>
                    </div>
                </div>
                <a href="" class="find-car-btn">Find Car</a>
            </div>
        </div>
    </div>
</div>


@push('app-scripts')
    <script>
        //Use Flatpickr to create calendar input
        const calendarInput = document.querySelectorAll('.calendar-input');
        flatpickr(calendarInput, {
            enableTime: true,
            dateFormat: "d/m/Y   H:i",
            altInput: true,
            altFormat: "d/m/Y   H:i",
            allowInput: true,
            defaultDate: `${new Date().getDate()}/${new Date().getMonth() + 1}/${new Date().getFullYear()}   ${new Date().getHours()}:${new Date().getMinutes()}`,
        });
    </script>
@endpush
