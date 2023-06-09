@extends('layouts.app')

@section('content')
    <div class="col-md-4 mx-auto">
        <div class="card" style="margin-top: 100px">
            <div class="card-header text-center bg-white">
                <h3 class="text-dark">
                    {{ __('Login') }}
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row mb-2">
                        <label for="username"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Username') }}</label>

                        <div class="col-md-12 ">
                            <input id="username" type="text"
                                class="form-control  @error('username') is-invalid @enderror" name="username"
                                placeholder="Enter Username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-1">
                        <label for="password"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Enter Password" autofocus>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <p class="" style="text-align: right"><a href="" style="color: #1cc88a; text-decoration: none">Forgot Password?</a></p>

                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lg fw-bold text-white" name="login-btn"
                                style="width: 100%; background: #1cc88a">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="form-group mb-0 d-flex justify-content-center">
                    <p class="text-secondary">Are you not a member yet?
                        <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: #1cc88a"> Sign
                            up now!</a>
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
