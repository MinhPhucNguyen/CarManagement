@extends('layouts.app')

@section('content')
    @include('auth.logoutModal')

    <div class="account-section">
        <div class="account-container">
            <div class="sidebar-account">
                <div>
                    <div style="padding-bottom: 0px"></div>
                    <div class="sidebar-sticky">
                        <div class="title fw-bold fs-1 mb-4">Xin chào bạn!</div>
                        <div class="sidebar">
                            <a class="sidebar-item" rel="page" href="/account">
                                <i class="fa-solid fa-user"></i>
                                <p>Tài khoản của tôi</p>
                            </a>
                            <a class="sidebar-item" rel="page" href="/myfavs">
                                <i class="fa-solid fa-heart"></i>
                                <p>Xe yêu thích</p>
                            </a>
                            <a class="sidebar-item" rel="page" href="/changepw">
                                <i class="fa-solid fa-lock"></i>
                                <p>Đổi mật khẩu</p>
                            </a>
                            @if (Auth::user()->role_as == '1')
                                <a class="sidebar-item " href="admin/dashboard" class=" sidebar-item">
                                    <i class="fa-solid fa-user-gear"></i>
                                    <p>{{ __('Admin') }}</p>
                                </a>
                            @endif
                            <a href="/logout" class="sidebar-item text-danger" data-bs-toggle="modal"
                                data-bs-target="#logoutModal">
                                <i class="fa-solid fa-arrow-left"></i>
                                <p>{{ __('Đăng xuất') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="account-content">
                @yield('account-content')
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const sidebarSticky = document.querySelector('.sidebar-sticky');
        const div = sidebarSticky.previousElementSibling;
        window.addEventListener('scroll', () => {
            const windowHeight = window.scrollY;
            if (windowHeight > 200 && windowHeight < 992) {
                sidebarSticky.style.position = 'fixed';
                sidebarSticky.style.top = '18px';
                sidebarSticky.style.left = '176.5px';
                sidebarSticky.style.width = '399.76px';
                div.style.paddingBottom = '528px';
            } else {
                sidebarSticky.style.position = 'unset';
                sidebarSticky.style.top = '18px';
                sidebarSticky.style.left = '176.5px';
                sidebarSticky.style.width = '399.76px';
                div.style.paddingBottom = '0px';
            }
        })
    </script>

    <script>
        const ajax = (url, callback) => {
            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", url, true);
            xhttp.onload = () => {
                if (xhttp.readyState === XMLHttpRequest.DONE && xhttp.status === 200) {
                    const response = xhttp.responseText; //dữ liệu trả vè từ ajax

                    const tempContainer = document.createElement('div');
                    tempContainer.innerHTML = response;
                    const accountContentElement = tempContainer.querySelector(
                        '#account-content'); //lấy account-content từ dữ liệu trả về

                    callback(accountContentElement); //gọi hàm callback và truyền vào accountContentElement
                }
            };
            xhttp.send();
        }

        const myFavsScripts = () => {
            //EVENTS FOR MYFAVS CONTENT
            const tabModeItems = document.querySelectorAll('.tab-mode-item');
            tabModeItems.forEach(item => {
                item.addEventListener('click', () => {
                    tabModeItems.forEach(item => {
                        item.classList.remove('active');
                    })
                    item.classList.add('active');
                })
            });
        }

        const changePWScripts = () => {
            //EVENTS FOR CHANGEPW CONTENT
            const showPasswordIcons = document.querySelectorAll('.fa-eye-slash');
            showPasswordIcons.forEach(item => {
                item.addEventListener('click', () => {
                    const input = item
                        .previousElementSibling; //previousElementSibling trả lại thẻ input phía trước của item
                    if (input.type === "password") {
                        input.type = "text";
                        item.classList.remove('fa-eye-slash');
                        item.classList.add('fa-eye');
                    } else {
                        input.type = "password";
                        item.classList.remove('fa-eye');
                        item.classList.add('fa-eye-slash');
                    }
                })
            });
        }

        const sidebarItem = document.querySelectorAll('.sidebar-item[rel=page]');
        sidebarItem.forEach(item => {
            item.pathname == window.location.pathname ? item.classList.add('active') :
                null; //nếu pathname của item == pathname của window thì thêm class active
            item.addEventListener("click", (e) => {
                e.preventDefault();

                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                })

                sidebarItem.forEach(item => {
                    item.classList.remove('active');
                })
                item.classList.add('active');

                const url = item.getAttribute('href');

                ajax(url, (data) => { //data là accountContentElement
                    document.querySelector('#account-content').innerHTML = data.innerHTML;

                    myFavsScripts();
                    changePWScripts();
                });

                if (url != window.location
                    .href) { //nếu url khác với url hiện tại thì pushState để thay đổi url 
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