@extends('layouts.app')


@section('content')
    <div class="account-section">
        <div class="account-container">
            <div class="sidebar-account">
                @if (Auth::user()->role_as == '1')
                    <a class="dropdown-item   mb-2" href="{{ url('admin/dashboard') }}" class="btn btn-secondary">
                        {{ __('Admin') }}
                    </a>
                @endif
                <a class="dropdown-item  mb-2 text-danger" href="{{ route('logout') }}" class="btn btn-secondary"
                    data-bs-toggle="modal" data-bs-target="#logoutModal">
                    {{ __('Đăng xuất') }}
                </a>
            </div>
            <div class="content-account">
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
@endpush
