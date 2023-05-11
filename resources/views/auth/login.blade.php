@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-dark">
                        <h2 class="text-white">
                            {{ __('Login') }}
                        </h2>
                    </div>

                    <div class="card-body mx-auto p-4 " style="width: 500px;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row mb-4">
                                <label for="username"
                                    class="col-md-3 col-form-label text-md-right fw-bold">{{ __('Username') }}</label>

                                <div class="col-md-12 ">
                                    <input id="username" type="text"
                                        class="form-control  @error('username') is-invalid @enderror" name="email"
                                        required placeholder="Enter Username">

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
                                        required placeholder="Enter Password">

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
                                <p class="text-secondary">Are you not a member yet?<a href=""
                                        class="fw-bold text-decoration-none text-dark"> Sign up now!</a></p>
                                <hr>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
