@extends('client.account.account_layout')

@section('account-content')
    <div class="content-item user-profile">
        <div class="content-title d-flex align-items-center justify-content-between">
            <div class="title-edit d-flex align-items-center">
                <h5 class="fs-3 mb-0">Thông tin tài khoản</h5>
                <div class="wrap-edit-btn">
                    <i class="fa-solid fa-pen"></i>
                </div>
            </div>
            <div class="total-trips d-flex">
                <i class="fa-solid fa-suitcase-rolling fs-3"></i>
                <p class="count mb-0">0</p>
                <span>Chuyến</span>
            </div>
        </div>
        <div class="content w-100 d-flex justify-content-between">
            <div class="avatar-wrap">
                <div class="avatar">
                    <div class="avatar-container">
                        <img src="{{ asset('../../uploads/avatar/default.jpg') }}" alt="avater">
                    </div>
                </div>
                <h6 class="user-fullname">
                    Minh Phúc Nguyễn
                </h6>
                <div class="note">Tham gia: <span>18/05/2023</span></div>
                <div class="trip-class">
                    <div>
                        <i class="fa-solid fa-medal fs-5"></i>
                        <p class="mb-0">0</p>
                        <span>điểm</span>
                    </div>
                </div>
            </div>
            <div class="info-wrap h-100 d-flex flex-column">
                <div class="info-box">
                    <div class="info-box-item d-flex justify-content-between align-items-center">
                        <p>Ngày sinh</p>
                        <p class="main">01/01/1950</p>
                    </div>
                    <div class="info-box-item d-flex justify-content-between align-items-center">
                        <p>Giới tính</p>
                        <p class="main">Nam</p>
                    </div>
                </div>
                <div class="info-desc">
                    <div class="info-desc-item">
                        <div class="title-item">
                            Số điện thoại
                            <div class="note success">
                                <i class="fa-solid fa-circle-check"></i>
                                Đã xác thực
                            </div>
                        </div>
                        <div class="name">
                            Thêm số điện thoại
                            <div class="wrap-edit-btn">
                                <i class="fa-solid fa-pen"></i>
                            </div>
                        </div>
                    </div>
                    <div class="info-desc-item">
                        <div class="title-item">
                            Email
                            <div class="note success">
                                <i class="fa-solid fa-circle-check"></i>
                                Đã xác thực
                            </div>
                        </div>
                        <div class="name">
                            minhphuc.nguyen1609@gmail.com
                            <div class="wrap-edit-btn">
                                <i class="fa-solid fa-pen"></i>
                            </div>
                        </div>
                    </div>
                    <div class="info-desc-item">
                        <div class="title-item">
                            Facebook
                        </div>
                        <div class="name">
                            Thêm liên kết
                            <div class="wrap-edit-btn">
                                <i class="fa-solid fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <div class="info-desc-item">
                        <div class="title-item">
                            Google
                        </div>
                        <div class="name">
                            Minh Phúc Nguyễn
                            <div class="wrap-edit-btn">
                                <i class="fa-solid fa-link"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-item driver-license">
        <div class="content-title d-flex align-items-center justify-content-between">
            <div class="title-edit d-flex align-items-center">
                <h5 class="fs-3 mb-0">Giấy phép lái xe</h5>
                <div class="note success">
                    <i class="fa-solid fa-circle-check"></i>
                    Đã xác thực
                </div>
            </div>
            <div class="btn d-flex align-items-center">
                <span>Chỉnh sửa</span>
                <i class="fa-solid fa-pen"></i>
            </div>
        </div>
        <div class="content w-100 d-flex justify-content-between">
            <div class="info-license">
                <div class="lincense-title">Thông tin chung</div>
                <div class="custom-input">
                    <div class="wrap-info fw-bold mb-1">Số GPLX</div>
                    <div class="wrap-input w-100">
                        <input type="text" name="driver-license-number" placeholder="Nhập số GPLX đã cấp" disabled>
                    </div>
                </div>
                <div class="custom-input">
                    <div class="wrap-info fw-bold mb-1">Họ và tên</div>
                    <div class="wrap-input w-100">
                        <input type="text" name="driver-license-fullname" placeholder="Nhập đầy đủ họ tên" disabled>
                    </div>
                </div>
                <div class="custom-input">
                    <div class="wrap-info fw-bold mb-1">Ngày sinh</div>
                    <div class="wrap-input w-100">
                        <input type="text" name="driver-license-birth" value="01/01/1970" disabled>
                    </div>
                </div>
            </div>
            <div class="info-license">
                <div class="lincense-title">Hình ảnh</div>
                <div class="license-upload w-100 h-100">    
                    <i class="fa-solid fa-cloud-arrow-up fs-2"></i>
                    <p>Chọn hình ảnh giấy phép</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content-item">
        <h5 class="fs-3">Giới thiệu bạn mới</h5>
        <p class="mb-0">Tìm hiểu chi tiết chương trình</p>
    </div>
@endsection

@push('app-scripts')
@endpush
