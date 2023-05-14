@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
=======
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center bg-dark">
                <h2 class="text-white">
                    {{ __('Register') }}
                </h2>
            </div>

            <div class="card-body mx-auto p-4 " style="width: 500px;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row mb-4">
                        <label for="username"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Username') }}</label>

                        <div class="col-md-12 ">
                            <input id="username" type="username"
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
                        <label for="email"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Email') }}</label>

                        <div class="col-md-12 ">
                            <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"
                                name="email" placeholder="e.g abc@example.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="phone"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Phone') }}</label>

                        <div class="col-md-12 ">
                            <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror"
                                name="phone" placeholder="Enter your phone number">
                            @error('phone')
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
                                class="form-control  @error('password') is-invalid @enderror" name="password"
                                placeholder="Enter Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="confirm_password"
                            class="col-md-6 col-form-label text-md-right fw-bold">{{ __('Confirm Password') }}</label>

                        <div class="col-md-12">
                            <input id="confirm_password" type="password"
                                class="form-control  @error('confirm_password') is-invalid @enderror"
                                name="confirm_password" placeholder="Confirm Password">
                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-lg fw-bold" name="register-btn"
                                style="width: 100%;">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
>>>>>>> 00f7521d751d71004bc09b188ebd2429f6cd563a
@endsection
