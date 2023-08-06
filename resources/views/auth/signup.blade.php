@extends('layouts.app')

@section('content')
    <div class="col-md-4 mx-auto mb-4">
        <div class="card">
            <div class="card-header text-center bg-white">
                <h3 class="text-dark">
                    Đăng ký
                </h3>
            </div>
            <div class="card-body">
                <form method="POST" class="row" id="register-form">
                    @csrf
                    <div class="form-group col-md-6 mb-2">
                        <label for="firstname" class="col-form-label text-md-right fw-bold">Tên</label>
                        <div class="col-md-12 ">
                            <input type="text" class="form-control " name="firstname" id="firstname">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="lastname" class=" col-form-label text-md-right fw-bold">Họ</label>
                        <div class="col-md-12 ">
                            <input type="text" class="form-control" name="lastname" id="lastname">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="fw-bolder">Giới tính</label>
                        <div>
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                                <label class="form-check-label" for="male">
                                    Nam
                                </label>
                            </div>
                            <div style="width: 10px; display: inline-block"></div>
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" name="gender" type="radio" id="female" value="0">
                                <label class="form-check-label" for="female">
                                    Nữ
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="username" class="col-md-3 col-form-label text-md-right fw-bold">Tên đăng nhập</label>
                        <div class="col-md-12 ">
                            <input id="username" type="text" class="form-control  " name="username">
                        </div>
                    </div>

                    <div class="form-group  mb-2">
                        <label for="email" class="col-md-3 col-form-label text-md-right fw-bold">Email</label>
                        <div class="col-md-12 ">
                            <input id="email" type="text" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="form-group  mb-2">
                        <label for="phone" class="col-md-3 col-form-label text-md-right fw-bold">Số điện thoại</label>

                        <div class="col-md-12 ">
                            <input id="phone" type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="form-group  mb-2">
                        <label for="address" class="col-md-3 col-form-label text-md-right fw-bold">Địa chỉ</label>

                        <div class="col-md-12 ">
                            <input id="address" type="text" class="form-control  " name="address">
                        </div>
                    </div>

                    <div class="form-group  mb-2">
                        <label for="password" class="col-md-3 col-form-label text-md-right fw-bold">Mật khẩu</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group  mb-4">
                        <label for="confirm_password" class="col-md-6 col-form-label text-md-right fw-bold">Nhập lại mật
                            khẩu</label>

                        <div class="col-md-12">
                            <input id="confirm_password" type="password" class="form-control " name="confirm_password">
                        </div>
                    </div>
                    <div class="form-group  mb-2">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lg fw-bold text-white mb-4 signup-btn"
                                name="register-btn">
                                Đăng ký
                            </button>
                        </div>
                    </div>

                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const register = async (userData) => {
            try {
                const response = await fetch("http://127.0.0.1:8000/api/register", {
                    method: "POST",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify(userData),
                });

                if (response.status === 200) {
                    const data = await response.json();
                    return data;
                } else {
                    return response.json()
                        .then((error) => {
                            throw new Error(error.message);
                        });
                }
            } catch (error) {
                alert(error);
            }
        };

        const registerForm = document.querySelector('#register-form');
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const userData = {
                firstname: document.querySelector('#firstname').value,
                lastname: document.querySelector('#lastname').value,
                gender: document.querySelector('input[name="gender"]:checked').value,
                username: document.querySelector('#username').value,
                email: document.querySelector('#email').value,
                phone: document.querySelector('#phone').value,
                address: document.querySelector('#address').value,
                password: document.querySelector('#password').value,
                confirm_password: document.querySelector('#confirm_password').value,
            };

            await register(userData)
                .then((response) => {
                    window.location.href = "/login";
                })
                .catch((error) => {
                    if (error.message !== "Đăng ký thành công" && error.message !==
                        "*Please enter your firstname (and 8 more errors)") {
                        alert(error.message);
                    }
                });
        });
    </script>
@endpush
