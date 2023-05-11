@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                                        class="form-control" name="username"
                                        required placeholder="Enter Username">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="email"
                                    class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Email') }}</label>

                                <div class="col-md-12 ">
                                    <input id="email" type="email"
                                        class="form-control" name="email"
                                        required placeholder="e.g abc@example.com">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="password"
                                    class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control" name="password"
                                        required placeholder="Enter Password">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="confirm-password"
                                    class="col-md-6 col-form-label text-md-right fw-bold">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="confirm-password" type="password"
                                        class="form-control" name="confirm-password"
                                        required placeholder="Confirm Password">
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
        </div>
    @endsection
