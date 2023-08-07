<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Carental</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,700&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/app_styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('client/css/about_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/blog_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/car_details.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/account/account_styles.css') }}">
</head>

<body>
    {{-- Top bar --}}
    @include('layouts.includes.client.topbar')

    {{-- Content --}}
    <main class="main">
        <div class="content-container">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    @if (strpos(Request::url(), 'login') === false && strpos(Request::url(), 'register') === false)
        @include('layouts.includes.client.footer')
    @endif

    {{-- <script src="{{ asset('assets/js/auth.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
    @stack('app-scripts')
    <script>
        const updateNavbar = () => {
            const authenticationContainer = document.querySelector('.authentication-container');
            const loginBtn = document.querySelector('#login-btn');
            const registerBtn = document.querySelector('#register-btn');
            const userInfo = document.querySelector('#user-info');

            if (localStorage.getItem('auth_token')) {
                authenticationContainer.innerHTML =
                    `<a id="user-info"
                    class="text-dark fw-bold text-decoration-none"
                    href="{{ url('/account') }}">
                    <img class="" src="" alt="avatar" width="40px"
                        height="40px" style="border-radius: 50%; margin-right: 15px">
                    Admin
                </a>`
            }
        }
        updateNavbar();
    </script>
</body>

</html>
