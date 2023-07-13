@extends('layouts.app')

@section('content')
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header text-center bg-dark">
                <h2 class="text-white">
                    {{ __('Sign Up') }}
                </h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" class="row">
                    @csrf
                    <div class="form-group col-md-6 mb-2">
                        <label for="firstname" class="col-form-label text-md-right fw-bold">{{ __('Firstname') }}</label>
                        <div class="col-md-12 ">
                            <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                name="firstname" placeholder="Enter Firstname"
                                value="{{ !$errors->has('firstname') ? old('firstname') : '' }}">
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="lastname" class=" col-form-label text-md-right fw-bold">{{ __('Lastname') }}</label>
                        <div class="col-md-12 ">
                            <input type="text" class="form-control  @error('lastname') is-invalid @enderror"
                                name="lastname" placeholder="Enter Username"
                                value="{{ !$errors->has('lastname') ? old('lastname') : '' }}">
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="fw-bolder">Gender</label>
                        <div>
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div style="width: 10px; display: inline-block"></div>
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" name="gender" type="radio" id="female" value="0">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="username"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Username') }}</label>

                        <div class="col-md-12 ">
                            <input id="username" type="text"
                                class="form-control  @error('username') is-invalid @enderror" name="username"
                                placeholder="Enter Username"
                                value="{{ !$errors->has('username') ? old('username') : '' }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  mb-2">
                        <label for="email"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Email') }}</label>
                        <div class="col-md-12 ">
                            <input id="email" type="text" class="form-control  @error('email') is-invalid @enderror"
                                name="email" placeholder="e.g abc@example.com"
                                value="{{ !$errors->has('email') ? old('email') : '' }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  mb-2">
                        <label for="phone"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Phone') }}</label>

                        <div class="col-md-12 ">
                            <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror"
                                name="phone" placeholder="Enter your phone number"
                                value="{{ !$errors->has('phone') ? old('phone') : '' }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  mb-2">
                        <label for="address"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Address') }}</label>

                        <div class="col-md-12 ">
                            <input id="address" type="text"
                                class="form-control  @error('address') is-invalid @enderror" name="address"
                                placeholder="Enter your address"
                                value="{{ !$errors->has('address') ? old('address') : '' }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  mb-2">
                        <label for="password"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="form-control  @error('password') is-invalid @enderror" name="password"
                                placeholder="Enter Password"
                                value="{{ !$errors->has('password') ? old('password') : '' }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  mb-4">
                        <label for="confirm_password"
                            class="col-md-6 col-form-label text-md-right fw-bold">{{ __('Confirm Password') }}</label>

                        <div class="col-md-12">
                            <input id="confirm_password" type="password"
                                class="form-control  @error('confirm_password') is-invalid @enderror"
                                name="confirm_password" placeholder="Confirm Password"
                                value="{{ !$errors->has('confirm_password') ? old('confirm_password') : '' }}">
                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  mb-2">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-lg fw-bold" name="register-btn"
                                style="width: 100%;">
                                {{ __('Sign Up') }}
                            </button>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection
