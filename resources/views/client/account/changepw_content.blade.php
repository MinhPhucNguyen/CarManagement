@extends('client.account.account_layout')

@section('account-content')
    <div class="content-title">
        <h4 class="fs-1 fw-bold">Đổi mật khẩu</h4>
        <p class="fs-5 mb-0">Vui lòng nhập mật khẩu hiện tại của bạn để thay đổi mật khẩu</p>
    </div>
    <div class="content-item change-pw">
        <div class="title fs-3 text-dark mb-4">Nhập mật khẩu</div>
        <div class="content">
            <div class="custom-input mb-4">
                <div class="wrap-info fw-bold mb-1">Mật khẩu hiện tại</div>
                <div class="wrap-input w-100">
                    <input type="password" name="ip_old_pw">
                    <i class="fa-regular fa-eye-slash fs-5"></i>
                </div>
            </div>
            <div class="custom-input mb-4">
                <div class="wrap-info fw-bold mb-1">Mật khẩu mới</div>
                <div class="wrap-input w-100">
                    <input type="password" name="ip_new_pw">
                    <i class="fa-regular fa-eye-slash fs-5"></i>
                </div>
            </div>
            <div class="custom-input mb-4">
                <div class="wrap-info fw-bold mb-1">Xác nhận mật khẩu mới</div>
                <div class="wrap-input w-100">
                    <input type="password" name="ip_new_pw_confirm">
                    <i class="fa-regular fa-eye-slash fs-5"></i>
                </div>
            </div>
            <div class="confirm-button">
                <button class="btn btn-primary">Xác nhận</button>
            </div>
        </div>
    </div>
@endsection