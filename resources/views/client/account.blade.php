@extends('layouts.app')

@section('content')
    @include('auth.logoutModal')

    <div class="account-section">
        <div class="account-container">
            <div class="sidebar-account">
                <div class="title fw-bold fs-2 mb-4">Xin chào bạn!</div>
                <div class="sidebar">
                    <a class="sidebar-item" href="">
                        <i class="fa-regular fa-user"></i>
                        <span>Tài khoản của tôi</span>
                    </a>
                    <a class="sidebar-item" href="">
                        <i class="fa-regular fa-user"></i>
                        <span>Xe yêu thích</span>
                    </a>
                    @if (Auth::user()->role_as == '1')
                        <a class="dropdown-item  mb-2" href="{{ url('admin/dashboard') }}"
                            class="btn btn-secondary sidebar-item">
                            {{ __('Admin') }}
                        </a>
                    @endif
                    <a class="dropdown-item  mb-2 text-danger" href="{{ route('logout') }}"
                        class="btn btn-secondary sidebar-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        {{ __('Đăng xuất') }}
                    </a>
                </div>
            </div>
            <div class="content-account">
                THIS IS CONTENT
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
@endpush
