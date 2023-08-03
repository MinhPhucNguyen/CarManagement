@extends('layouts.app')

@section('content')
    @include('auth.logoutModal')

    <div class="account-section">
        <div class="account-container">
            <div class="sidebar-account">
                <div class="title fw-bold fs-2 mb-4">Xin chào bạn!</div>
                <div class="sidebar ">
                    <a class="sidebar-item" rel="page" href="/account">
                        <i class="fa-solid fa-user"></i>
                        <p>Tài khoản của tôi</p>
                    </a>
                    <a class="sidebar-item" rel="page" href="/myfavs">
                        <i class="fa-solid fa-heart"></i>
                        <p>Xe yêu thích</p>
                    </a>
                    <a class="sidebar-item" rel="page" href="/resetpw">
                        <i class="fa-solid fa-lock"></i>
                        <p>Đổi mật khẩu</p>
                    </a>
                    @if (Auth::user()->role_as == '1')
                        <a class="sidebar-item " href="admin/dashboard" class=" sidebar-item">
                            <i class="fa-solid fa-user-gear"></i>
                            <p>{{ __('Admin') }}</p>
                        </a>
                    @endif
                    <a href="/logout" class="sidebar-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fa-solid fa-arrow-left"></i>
                        <p>{{ __('Đăng xuất') }}</p>
                    </a>
                </div>
            </div>
            <div id="account-content">
                @yield('account-content', view('client.account.account_content'))
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const ajax = (url, callback) => {
            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", url, true);
            xhttp.onload = () => {
                if (xhttp.readyState === XMLHttpRequest.DONE && xhttp.status === 200) {
                    const response = xhttp.responseText; //dữ liệu trả vè từ ajax

                    const tempContainer = document.createElement('div');
                    tempContainer.innerHTML = response;
                    const accountContentElement = tempContainer.querySelector('#account-content'); //lấy account-content từ dữ liệu trả về

                    callback(accountContentElement); //gọi hàm callback và truyền vào accountContentElement
                }
            };
            xhttp.send();
        }

        const sidebarItem = document.querySelectorAll('.sidebar-item[rel=page]');
        sidebarItem.forEach(item => {
            item.pathname == window.location.pathname ? item.classList.add('active') : null; //nếu pathname của item == pathname của window thì thêm class active
            item.addEventListener("click", (e) => {
                e.preventDefault();
                sidebarItem.forEach(item => {
                    item.classList.remove('active');
                })
                item.classList.add('active');

                const url = item.getAttribute('href');

                ajax(url, (data) => { //data là accountContentElement
                    document.querySelector('#account-content').innerHTML = data.innerHTML;
                });

                if (url != window.location.href) { //nếu url khác với url hiện tại thì pushState để thay đổi url 
                    window.history.pushState({}, "", url); //thay đổi url
                }
                return false;
            });
        });

        window.addEventListener("popstate", () => {
            ajax(window.location.pathname, (data) => {
                document.querySelector('#account-content').innerHTML = data.innerHTML;
            });
        });
    </script>
@endpush
