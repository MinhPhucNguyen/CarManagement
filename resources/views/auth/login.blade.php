@extends('layouts.app')

@section('content')
    <div class="col-md-4 mx-auto">
        <div class="card" style="margin-top: 100px">
            <div class="card-header text-center bg-white">
                <h3 class="text-dark"> Đăng nhập </h3>
            </div>
            <div class="card-body mx-auto " style="width: 500px;">
                <form method="POST" id="login-form">
                    @csrf
                    <div class="form-group row mb-2">
                        <label for="username" class="col-md-3 col-form-label text-md-right fw-bold w-100">Tên
                            đăng nhập</label>
                        <div class="col-md-12 ">
                            <input id="username" type="text" class="form-control" name="username"
                                placeholder="Nhập tên đăng nhập" autofocus>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="password" class="col-md-3 col-form-label text-md-right fw-bold">Mật khẩu</label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password"
                                placeholder="Nhập Mật khẩu" autofocus>
                        </div>
                    </div>
                    <p class="" style="text-align: right"><a href=""
                            style="color: #1cc88a; text-decoration: none">Quên Mật khẩu ?</a></p>
                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lg fw-bold text-white login-btn" name="login-btn">Đăng
                                nhập</button>
                        </div>
                    </div>
                </form>
                <div class="form-group mb-0 d-flex justify-content-center">
                    <p class="text-secondary">Bạn chưa là thành viên ?
                        <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: #1cc88a">Đăng
                            ký ngay</a>
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script> 
        const login = async (username, password) => {
            try {
                const response = await fetch("http://127.0.0.1:8000/api/login", {
                    method: "POST",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({
                        username,
                        password
                    }),
                });

                if (response.ok) {
                    const data = await response.json();
                    return data;
                } else {
                    return response.json()
                        .then((data) => {
                            throw new Error(data.message);
                        });
                }
            } catch (error) {
                throw new Error("Có lỗi xảy ra");
            }
        }

        const loginForm = document.querySelector("#login-form");
        loginForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const username = document.querySelector('#username').value;
            const password = document.querySelector('#password').value;

            await login(username, password)
                .then((response) => {
                    const user = response.data.user;
                    const userRole_as = user.role_as;
                    updateNavbar(user);
                    localStorage.setItem("auth_token", response.data.token);
                    if (userRole_as === 1) {
                        window.location.href = "admin/dashboard";
                    } else if (userRole_as === 0) {
                        window.location.href = "/home";
                    }
                })
                .catch((error) => {
                    if (error.message !== "Đăng nhập thành công" && error.message !==
                        "*Vui lòng nhập tên đăng nhập (and 1 more error)") {
                        alert(error.message);
                    }
                });
        });
    </script>
@endpush
