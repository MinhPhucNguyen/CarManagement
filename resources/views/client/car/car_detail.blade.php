@extends('layouts.app')

@section('content')
    <div class="car_detail_container">
        <div class="car_image">
            <div class="car_image_container">
                <div class="main_image"></div>
                <div class="sub_image"></div>
            </div>
        </div>
        <div class="car-detail">
            <div class="car-detail-content">
                <div class="infor-car-basic">
                    <div class="group-name">
                        <h3></h3>
                        <div class="group-action">
                            <div class="wrap-ic"><i class="fa-solid fa-share-nodes"></i></div>
                            <div class="wrap-ic"><i class="fa-solid fa-heart"></i></div>
                        </div>
                    </div>
                    <div class="group-total">
                        <div class="ic"><i class="fa-solid fa-suitcase-rolling"></i></div>
                        <span class="info"></span>
                        <span class="dot">•</span>
                        <span class="info address"></span>
                    </div>
                    <div class="group-tag">
                        <span class="tag-transmission"></span>
                        <span class="tag-delivery">Giao xe tận nơi</span>
                    </div>
                </div>
            </div>
            <div class="car-detail-sidebar">
                <div class="rent-box">
                    <div class="price">
                        <h4></h4>
                    </div>
                    <div class="date-time-form">
                        <div class="form-item">
                            <label for="">Nhận xe</label>
                            <div class="form-choose">
                                <input class="calendar-input-time fw-bold border-0" id="st-time">
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-item">
                            <label for="">Trả xe</label>
                            <div class="form-choose">
                                <input class="calendar-input-time fw-bold border-0" id="nd-time">
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-form">
                        <label for="">Địa điểm giao nhận xe</label>
                        <div class="dropdown fw-bold"></div>
                    </div>
                    <div class="line-page"></div>
                    <div class="price-container">
                        <div class="price-item">
                            <p>Đơn giá thuê</p>
                            <p class="cost" id="originalPrice"></p>
                        </div>
                        <div class="price-item">
                            <p>Phí dịch vụ</p>
                            <p class="cost" id="servicesFee">100000đ/ngày</p>
                        </div>
                        <div class="line-page"></div>
                        <div class="price-item mt-3">
                            <p>Tổng phí thuê xe</p>
                            <p class="cost" id="total"></p>
                        </div>
                        <div class="promotion">
                            <div class="promotion-icon"><i class="fa-solid fa-ticket"></i></div>
                            <p>Sử dụng mã khuyển mại</p>
                        </div>
                        <div class="line-page"></div>
                        <div class="price-item total-price">
                            <p>Tổng cộng</p>
                            <p class="cost" id="total"></p>
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
                                <div class="main" id="seat"></div>
                            </div>
                        </div>
                        <div class="outstanding-features-item">
                            <div class="ic"></div>
                            <div class="title">
                                <div class="sub">Truyền động</div>
                                <div class="main" id="transmission"></div>
                            </div>
                        </div>
                        <div class="outstanding-features-item">
                            <div class="ic"></div>
                            <div class="title">
                                <div class="sub">Nhiên liệu</div>
                                <div class="main" id="fuel"></div>
                            </div>
                        </div>
                        <div class="outstanding-features-item">
                            <div class="ic"></div>
                            <div class="title">
                                <div class="sub">NL tiêu hao</div>
                                <div class="main" id="fuelConsumption"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-page"></div>
                <div class="infor-car-desc">
                    <h6>Mô tả</h6>
                    <div class="desc"></div>
                    <div class="read-more fw-bold d-flex align-items-center">
                    </div>
                </div>
                <div class="line-page mt-4"></div>
                <div class="infor-car-desc">
                    <h6>Các tiện nghi khác</h6>
                    <div class="feature w-50">
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
                <div class="infor-car-desc">
                    <h6>Chính sách hủy chuyến</h6>
                    <div class="cancel-policy w-100">
                        <div class="column title">
                            <div class="column-item">Thời điểm hủy chuyển</div>
                            <div class="column-item">Khách thuê hủy chuyển</div>
                            <div class="column-item">Chủ xe hủy chuyển</div>
                        </div>
                        <div class="column">
                            <div class="column-item case">Trong vòng 1h sau đặt cọc</div>
                            <div class="column-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <div>Hoàn tiền 100%</div>
                            </div>
                            <div class="column-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <div>Không đền cọc</div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column-item case">Trước Chuyến Đi >7 Ngày</div>
                            <div class="column-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <div>Hoàn tiền 70%</div>
                            </div>
                            <div class="column-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <div>Trước Chuyến Đi >7 Ngày</div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column-item case">Trong Vòng 7 Ngày Trước Chuyến Đi</div>
                            <div class="column-item">
                                <i class="fa-solid fa-circle-xmark"></i>
                                <div>Không hoàn tiền</div>
                            </div>
                            <div class="column-item">
                                <i class="fa-solid fa-circle-xmark"></i>
                                <div>Đền cọc 100%</div>
                            </div>
                        </div>
                        <div class="note">
                            <p>* Khách thuê không nhận xe sẽ không được hoàn cọc</p>
                            <p>* Chủ xe không giao xe sẽ đền 100% tiền cọc</p>
                            <p>* Tiền cọc sẽ được hoàn trả trong vòng 1-3 ngày làm việc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const calendarInputStartTime = document.querySelectorAll('#st-time');
        flatpickr(calendarInputStartTime, {
            enableTime: true,
            dateFormat: "d/m/Y H:i",
            altInput: true,
            altFormat: "d/m/Y H:i",
            allowInput: true,
            defaultDate: `${new Date().getDate()}/${new Date().getMonth() + 1}/${new Date().getFullYear()} ${new Date().getHours()}:${new Date().getMinutes()}`,
        });

        const calendarInputEndTime = document.querySelectorAll('#nd-time');
        flatpickr(calendarInputEndTime, {
            enableTime: true,
            dateFormat: "d/m/Y  H:i",
            altInput: true,
            altFormat: "d/m/Y   H:i",
            allowInput: true,
            defaultDate: `${new Date().getDate() + 1}/${new Date().getMonth() + 1}/${new Date().getFullYear()} ${new Date().getHours()}:${new Date().getMinutes()}`,
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
                const carImageContainer = document.querySelector('.car_image_container');
                const mainImage = document.querySelector('.main_image');
                const subImage = document.querySelector('.sub_image');
                const carImagesArr = response.data.carImages;
                const carName = document.querySelector('.group-name h3');
                const groupTotal = document.querySelector('.group-total');
                const tagTransmission = document.querySelector('.tag-transmission');
                const tagDelivery = document.querySelector('.tag-delivery');
                const seat = document.querySelector('#seat');
                const transmission = document.querySelector('#transmission');
                const fuel = document.querySelector('#fuel');
                const desc = document.querySelector('.infor-car-desc .desc');
                const servicesFee = document.querySelector('#servicesFee');
                const total = document.querySelector('#total');
                const readMore = document.querySelector('.read-more');
                const carFeature = document.querySelector('.feature');

                carName.textContent = response.data.carCustomName;

                groupTotal.querySelector('.info').textContent = response.data.numberOfTrip + " Chuyến";

                groupTotal.querySelector('.address').textContent = response.data.location;

                tagTransmission.textContent = response.data.transmission == '0' ? 'Số tự động' : 'Số sàn';

                response.data.delivery_enable == '1' ? '' : tagDelivery.style.display = 'none';

                seat.textContent = response.data.seat + " chỗ";

                transmission.textContent = response.data.transmission == '0' ? 'Số tự động' : 'Số sàn';

                fuel.textContent = response.data.fuel;

                if (response.data.features.length == 0) {
                    carFeature.innerHTML = `<div style="color: #7c7c7c">*Không có tiện nghi khác</div>`;
                } else {
                    carFeature.innerHTML = response.data.features.map((feature) => {
                        return `<div class="feature-item">${feature.featureName}</div>`;
                    }).join('');

                }

                document.querySelector('#fuelConsumption').textContent = response.data.fuelConsumption + " lít/100km";

                desc.innerHTML = response.data.desc;
                if (desc.offsetHeight > 186) {
                    readMore.textContent = "Đọc thêm...";
                    desc.classList.add('hide');
                    desc.classList.add('gradient');
                    readMore.addEventListener('click', function() {
                        desc.classList.toggle('hide');
                        if (desc.classList.contains('hide')) {
                            desc.classList.remove('no-before');
                            readMore.textContent = "Đọc thêm...";
                        } else {
                            desc.classList.add('no-before');
                            readMore.innerHTML = `Thu gọn  <i class="fa-solid fa-angle-up"></i></div>`;
                        }
                    })
                }

                document.querySelector('.price h4').textContent = new Intl.NumberFormat('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                }).format(response.data.price) + "/ngày";

                servicesFee.textContent = new Intl.NumberFormat('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                }).format(100000) + "/ngày";

                document.querySelector('.dropdown-form .dropdown').textContent = response.data.location;

                document.querySelector('#originalPrice').textContent = new Intl.NumberFormat('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                }).format(response.data.price) + '/ngày';

                //Calulate total price of bill
                const totalPrice = response.data.price + 100000;
                total.innerHTML = new Intl.NumberFormat('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                }).format(totalPrice) + ' <small>X</small> 1 ngày';

                //Display car image
                if (carImagesArr[0]) {
                    mainImage.innerHTML =
                        ` <div class="cover_car_image">
                             <img src="{{ asset('${carImagesArr[0].imagePath}') }}" alt="${response.data.carCustomName}">
                        </div>`
                }
                //get 3 sub item of an array
                const newCarImageArr = carImagesArr.slice(1, 4);
                const carImageHtml = newCarImageArr.map((item) => {
                    return `<div class="cover_car_image">
                        <img src="{{ asset('${item.imagePath}') }}" alt="car_image">
                    </div>`
                })
                subImage.innerHTML = carImageHtml.join('');

            })
            .catch((err) => {
                alert(err);
            })
    </script>
@endpush
