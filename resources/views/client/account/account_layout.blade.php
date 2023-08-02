@extends('layouts.app')

@section('content')
    @include('auth.logoutModal')

    <div class="account-section">
        <div class="account-container">
            <div class="sidebar-account">
                <div class="title fw-bold fs-2 mb-4">Xin chào bạn!</div>
                <div class="sidebar ">
                    <a class="sidebar-item" aria-current="page" href="/account" onclick="routeToAccount(event)">
                        <i class="fa-solid fa-user"></i>
                        <p>Tài khoản của tôi</p>
                    </a>
                    <a class="sidebar-item" href="/myfavs" onclick="routeToMyFavs(event)">
                        <i class="fa-solid fa-heart"></i>
                        <p>Xe yêu thích</p>
                    </a>
                    <a class="sidebar-item" href="/resetpw">
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
        const routeToMyFavs = (event) => {
            event.preventDefault();
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector("#account-content").innerHTML = this.responseText;
                }
            }
            history.pushState({}, '', '/myfavs');
            xhttp.open('GET', '/myfavs', true);
            xhttp.send();
        }


        const routeToAccount = (event) => {
            event.preventDefault();
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const tempContent = document.createElement('div');
                    tempContent.innerHTML = this.responseText; //dữ liệu trả về từ controller

                    //get content in account-content
                    const accountContentElement = tempContent.querySelector('#account-content');

                    document.querySelector("#account-content").innerHTML = accountContentElement.innerHTML;
                }
            }
            history.pushState({}, '', '/account');
            xhttp.open('GET', "/account", true);
            xhttp.send();
        }
    </script>
@endpush
