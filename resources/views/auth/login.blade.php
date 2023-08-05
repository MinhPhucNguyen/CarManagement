@extends('layouts.app')

@section('content')
    <div class="col-md-4 mx-auto">
        <div class="card" style="margin-top: 100px">
            <div class="card-header text-center bg-white">
                <h3 class="text-dark">
                    {{ __('Đăng nhập') }}
                </h3>
            </div>

            <div class="card-body mx-auto" style="width: 500px;">
                @error('login_error')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong> {{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-sharp fa-solid fa-circle-check"></i>
                        <strong> {{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" id="login-form">
                    @csrf
                    <div class="form-group row mb-2">
                        <label for="username"
                            class="col-md-3 col-form-label text-md-right fw-bold w-100">{{ __('Tên đăng nhập') }}</label>

                        <div class="col-md-12 ">
                            <input id="username" type="text"
                                class="form-control  @error('username') is-invalid @enderror" name="username"
                                placeholder="Nhập Username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <label for="password"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Mật khẩu') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Nhập Mật khẩu" autofocus>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <p class="" style="text-align: right"><a href=""
                            style="color: #1cc88a; text-decoration: none">Quên Mật khẩu ?</a></p>

                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lg fw-bold text-white login-btn" name="login-btn">
                                {{ __('Đăng nhập') }}
                            </button>
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
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({
                        username,
                        password,
                    }), // Convert data to JSON
                });

                if (response.status === 200) {
                    const data = await response.json(); // Use await to get the actual data from the response
                    return data;
                }
            } catch (err) {
                alert(err);
            }
        };

        document.getElementById('login-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            await login(username, password)
                .then((response) => {
                    const userRole_as = response.data.user.role_as;
                    if (userRole_as === 1) {
                        window.location.href = "{{ route('admin.dashboard') }}";
                    } else if (userRole_as === 0) {
                        window.location.href = "{{ route('home') }}";
                    }
                })
                .catch((err) => {
                    alert(err);
                });
        });
    </script>
@endpush
