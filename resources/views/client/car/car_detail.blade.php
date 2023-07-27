@extends('layouts.app')

@section('content')
    <div class="car_detail_container">
        <div class="car_image">
            <div class="car_image_container">
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
        <div class="car-detail">
            <div class="car-detail-content">
                <div class="infor-car-basic">
                    <div class="group-name">
                        <h3>HONDA CITY 2014</h3>
                        <div class="group-action">
                            <div class="wrap-ic"><i class="fa-solid fa-share-nodes"></i></div>
                            <div class="wrap-ic"><i class="fa-solid fa-heart"></i></div>
                        </div>
                    </div>
                    <div class="group-total">
                        <div class="ic"><i class="fa-solid fa-suitcase-rolling"></i></div>
                        <span class="info">57 Chuyến</span>
                        <span class="dot">•</span>
                        <span class="info">Quận Tân Bình, Hồ Chí Minh</span>
                    </div>
                    <div class="group-tag">
                        <span class="tag-transmission">Số tự động</span>
                    </div>
                </div>
            </div>
            <div class="car-detail-sidebar">
                <div class="rent-box">
                    <div class="price">
                        <h4>1199K/ngày</h4>
                    </div>
                    <div class="date-time-form">
                        <div class="form-item">
                            <label for="">Nhận xe</label>
                            <div class="form-choose">
                                <input class="calendar-input">
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-item">
                            <label for="">Trả xe</label>
                            <div class="form-choose">
                                <input class="calendar-input">
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-form">
                        <label for="">Địa điểm giao nhận xe</label>
                        <div class="dropdown fw-bold">
                            Quận 4, Hồ Chí Minh
                        </div>
                    </div>
                    <div class="line-page"></div>
                    <div class="price-container">
                        <div class="price-item">
                            <p>Đơn giá thuê</p>
                            <p class="cost">1 199 000đ/ ngày</p>
                        </div>
                        <div class="price-item">
                            <p>Phí dịch vụ </p>
                            <p class="cost">159 467đ/ ngày</p>
                        </div>
                        <div class="line-page"></div>
                        <div class="price-item mt-3">
                            <p>Tổng phí thuê xe</p>
                            <p class="cost">159 467đ/ ngày</p>
                        </div>
                        <div class="promotion">
                            <div class="promotion-icon"><i class="fa-solid fa-ticket"></i></div>
                            <p>Sử dụng mã khuyển mại</p>
                        </div>
                        <div class="line-page"></div>
                        <div class="price-item total-price">
                            <p>Tổng cộng</p>
                            <p class="cost">159 467đ/ ngày</p>
                        </div>
                        <a href="" class="order-btn w-100">
                            <i class="fa-solid fa-bolt"></i>
                            <span>ĐẶT XE</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="car-detail-content">
                <div class="line-page"></div>
                <div class="infor-car-desc">
                    <h6>Đặc điểm</h6>
                    <div class="outstanding-features">
                        <div class="outstanding-features-item">
                            <div class="ic"></div>
                            <div class="title">
                                <div class="sub">Số ghế</div>
                                <div class="main">5 chỗ</div>
                            </div>
                        </div>
                        <div class="outstanding-features-item">
                            <div class="ic"></div>
                            <div class="title">
                                <div class="sub">Truyển động</div>
                                <div class="main">Số tự dộng</div>
                            </div>
                        </div>
                        <div class="outstanding-features-item">
                            <div class="ic"></div>
                            <div class="title">
                                <div class="sub">Nhiên liệu</div>
                                <div class="main">Xăng</div>
                            </div>
                        </div>
                        <div class="outstanding-features-item">
                            <div class="ic"></div>
                            <div class="title">
                                <div class="sub">NL tiêu hao</div>
                                <div class="main">7 lít / 100km</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-page"></div>
                <div class="infor-car-desc">
                    <h6>Mô tả</h6>
                    <div class="desc">
                        Honda city dang ky 2014. Nhug den nay moi chay dc 100,000km thoi, xe con rat ngon. Xe gia dinh nen
                        rat sach se, đăng kiểm bảo dưỡng dình kỳ nên máy rất êm, số tự động chay rất nhẹ nhàng, thoải mái.
                        Nội thất rộng rãi, cốp xe rất rộng, chứa được rất nhiều đồ. Có Trang bi đầy đủ camera hinh trình,
                        camera lui, man hinh giai tri
                    </div>
                </div>
                <div class="line-page"></div>
                <div class="infor-car-desc">
                    <h6>Các tiện nghi khác</h6>
                    <div class="">

                    </div>
                </div>
                <div class="line-page"></div>
                <div class="infor-car-desc">
                    <h6>Điều khoản</h6>
                    <pre>
                        Quy định khác:
                        ◦ Sử dụng xe đúng mục đích.
                        ◦ Không sử dụng xe thuê vào mục đích phi pháp, trái pháp luật.
                        ◦ Không sử dụng xe thuê để cầm cố, thế chấp.
                        ◦ Không hút thuốc, nhả kẹo cao su, xả rác trong xe.
                        ◦ Không chở hàng quốc cấm dễ cháy nổ.
                        ◦ Không chở hoa quả, thực phẩm nặng mùi trong xe.
                        ◦ Khi trả xe, nếu xe bẩn hoặc có mùi trong xe, khách hàng vui lòng vệ sinh xe sạch sẽ hoặc gửi phụ
                        thu phí vệ sinh xe.
                        Trân trọng cảm ơn, chúc quý khách hàng có những chuyến đi tuyệt vời !
                    </pre>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const calendarInput = document.querySelectorAll('.calendar-input');
        flatpickr(calendarInput, {
            enableTime: true,
            dateFormat: "d/m/Y    H:i",
            altInput: true,
            altFormat: "d/m/Y    H:i",
            allowInput: true,
            defaultDate: `${new Date().getDate()}/${new Date().getMonth() + 1}/${new Date().getFullYear()}   ${new Date().getHours()}:${new Date().getMinutes()}`,
        });
    </script>

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
