<div id="banner-section">
    <div class="banner">
        <div class="banner-title">
            CARENTAL-CÙNG BẠN TRÊN MỌI HÀNH TRÌNH
        </div>
        <div class="search-option">
            <div class="option d-flex justify-content-center shadow">
                <div class="option-item active">
                    <i class="fa-solid fa-car-side"></i>
                    <span>Xe tự lái</span>
                </div>
                <div class="option-item">
                    <i class="fa-solid fa-user"></i>
                    <span>Xe có tài xế</span>
                </div>
            </div>
            <div class="search shadow d-flex">
                <div class="search-form-item address">
                    <div class="search-form-title fw-bold">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Địa chỉ</span>
                    </div>
                    <div class="search-form-choose">
                        <input type="text" placeholder="Nhập địa điểm" class="address-input"
                            value="Hanoi">
                    </div>
                </div>
                <div class="search-form-item_divider"></div>
                <div class="calendar-wrap d-flex">
                    <div class="search-form-item address">
                        <div class="search-form-title fw-bold">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Bắt đầu</span>
                        </div>
                        <div class="search-form-choose">
                            <input class="calendar-input">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="search-form-item_divider"></div>
                    <div class="search-form-item address">
                        <div class="search-form-title fw-bold">
                            <i class="fa-regular fa-calendar"></i>
                            <span>Kết thúc</span>
                        </div>
                        <div class="search-form-choose">
                            <input class="calendar-input">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
                <a href="" class="find-car-btn">Tìm xe</a>
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

        const arrowDownIcons = document.querySelectorAll('.search-form-choose i');
        arrowDownIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                calendarInput.forEach(input => {
                    if (icon.parentElement === input.parentElement && !input._flatpickr.isOpen) {
                        input._flatpickr.open();
                    }
                })
            })
        });
    </script>
@endpush
