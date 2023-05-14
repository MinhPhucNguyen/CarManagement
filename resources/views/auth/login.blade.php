@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
=======
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center bg-dark">
                <h2 class="text-white">
                    {{ __('Login') }}
                </h2>
            </div>

            <div class="card-body mx-auto p-4 " style="width: 500px;">
                @error('login_error')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> {{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
>>>>>>> 00f7521d751d71004bc09b188ebd2429f6cd563a
                </div>
                @enderror
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>        
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row mb-4">
                        <label for="username"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Username') }}</label>

                        <div class="col-md-12 ">
                            <input id="username" type="text"
                                class="form-control  @error('username') is-invalid @enderror" name="username"
                                placeholder="Enter Username">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
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

                    <div class="form-group row mb-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-lg fw-bold" name="login-btn"
                                style="width: 100%;">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <p class="text-secondary">Are you not a member yet?<a href="{{ route('register') }}"
                                class="fw-bold text-decoration-none text-dark"> Sign up now!</a></p>
                        <hr>
                    </div>
                </form>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
=======
>>>>>>> 00f7521d751d71004bc09b188ebd2429f6cd563a
@endsection
