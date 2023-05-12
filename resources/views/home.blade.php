@extends('layouts.app')

@section('content')
    @if (session()->has('success')) {{-- Kiểm tra key success có tồn tại trọng session không --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2>Welcome to home page</h2>
@endsection
