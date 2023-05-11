@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>
                            {{ __('Login') }}
                        </h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('login')}}">
                            @csrf

                            <div class="form-group row mb-4">
                                <label for="username"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-9">
                                    <input id="username" type="email"
                                        class="form-control @error('username') is-invalid @enderror" name="email"
                                        value="{{ old('username') }}" required autocomplete="email" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="password"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-9">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-lg" name="login-btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
