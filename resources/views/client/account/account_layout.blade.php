@extends('layouts.app')

@section('content')
    @include('auth.logoutModal')

    <div class="account-section">
        <div class="account-container">
            <div class="sidebar-account">
                <div class="title fw-bold fs-2 mb-4">Xin chào bạn!</div>
                <div class="sidebar ">
                    <a class="sidebar-item" aria-current="page" href="/account" onclick="routeToTabs(event, '/account')">
                        <i class="fa-solid fa-user"></i>
                        <p>Tài khoản của tôi</p>
                    </a>
                    <a class="sidebar-item" href="/myfavs" onclick="routeToTabs(event, '/myfavs')">
                        <i class="fa-solid fa-heart"></i>
                        <p>Xe yêu thích</p>
                    </a>
                    <a class="sidebar-item" href="/resetpw" onclick="routeToTabs(event, '/resetpw')">
                        <i class="fa-solid fa-lock"></i>
                        <p>Đổi mật khẩu</p>
                    </a>
                    @if (Auth::user()->role_as == '1')
                        <a class="sidebar-item " href="{{ url('admin/dashboard') }}" class=" sidebar-item">
                            <i class="fa-solid fa-user-gear"></i>
                            <p>{{ __('Admin') }}</p>
                        </a>
                    @endif
                    <a href="{{ route('logout') }}" class="sidebar-item text-danger" data-bs-toggle="modal"
                        data-bs-target="#logoutModal">
                        <i class="fa-solid fa-arrow-left"></i>
                        <p>{{ __('Đăng xuất') }}</p>
                    </a>
                </div>
            </div>
            <div id="account-content">
                @include('client.account.account_content')
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const routeToTabs = (event, url) => {
            event.preventDefault();

            const xhttp = new window.XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (url === '/account') {
                        const tempContainer = document.createElement('div');
                        tempContainer.innerHTML = this.responseText;

                        const accountContentElement = tempContainer.querySelector("#account-content");
                        document.querySelector("#account-content").innerHTML = accountContentElement.innerHTML;
                    } else {
                        document.querySelector("#account-content").innerHTML = this.responseText;
                    }
                    console.log(document.querySelector('#account-content').innerHTML);
                }
            };
            window.history.pushState({}, "", url);
            xhttp.open("GET", url, true);
            xhttp.send();
        }
    </script>
@endpush
