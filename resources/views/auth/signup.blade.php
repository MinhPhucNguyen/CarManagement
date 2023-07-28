@extends('layouts.app')

@section('content')
    <div class="col-md-4 mx-auto mb-4">
        <div class="card">
            <div class="card-header text-center bg-white">
                <h3 class="text-dark">
                    {{ __('Đăng ký') }}
                </h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" class="row">
                    @csrf
                    <div class="form-group col-md-6 mb-2">
                        <label for="firstname" class="col-form-label text-md-right fw-bold">{{ __('Tên') }}</label>
                        <div class="col-md-12 ">
                            <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                name="firstname" value="{{ !$errors->has('firstname') ? old('firstname') : '' }}">
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="lastname" class=" col-form-label text-md-right fw-bold">{{ __('Họ') }}</label>
                        <div class="col-md-12 ">
                            <input type="text" class="form-control  @error('lastname') is-invalid @enderror"
                                name="lastname" value="{{ !$errors->has('lastname') ? old('lastname') : '' }}">
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
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
                        <label for="username"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Tên đăng nhập') }}</label>

                        <div class="col-md-12 ">
                            <input id="username" type="text"
                                class="form-control  @error('username') is-invalid @enderror" name="username"
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
                                name="email" value="{{ !$errors->has('email') ? old('email') : '' }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group  mb-2">
                        <label for="phone"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Số điện thoại') }}</label>

                        <div class="col-md-12 ">
                            <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror"
                                name="phone" value="{{ !$errors->has('phone') ? old('phone') : '' }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  mb-2">
                        <label for="address"
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Địa chỉ') }}</label>

                        <div class="col-md-12 ">
                            <input id="address" type="text"
                                class="form-control  @error('address') is-invalid @enderror" name="address"
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
                            class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Mật khẩu') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="form-control  @error('password') is-invalid @enderror" name="password"
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
                            class="col-md-6 col-form-label text-md-right fw-bold">{{ __('Nhập lại mật khẩu') }}</label>

                        <div class="col-md-12">
                            <input id="confirm_password" type="password"
                                class="form-control  @error('confirm_password') is-invalid @enderror"
                                name="confirm_password" 
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
                            <button type="submit" class="btn btn-lg fw-bold text-white mb-4 signup-btn"
                                name="register-btn">
                                {{ __('Đăng ký') }}
                            </button>
                        </div>
                    </div>

                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection
