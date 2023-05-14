@extends('layouts.app')

@section('content')
<<<<<<< HEAD
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<?php echo date('Y-m-d h:i:s');
=======
    @if (session()->has('success')) {{-- Kiểm tra key success có tồn tại trọng session không --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2>Welcome to home page</h2>
@endsection
>>>>>>> 00f7521d751d71004bc09b188ebd2429f6cd563a
