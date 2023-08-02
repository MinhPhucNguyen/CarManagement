<nav class="navbar navbar-expand-lg">
    <div class="navbar-container text-dark p-0 d-flex">
        <a class="navbar-brand text-dark fw-bold text-uppercase fs-4 " href="{{ url('/home') }}">
            CA<span style="color: #1cc88a">R</span>ENTAL
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark btn" href="{{ route('client.about') }}">Về Chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark btn" href="">Trờ thành chủ xe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark btn" href="{{ route('client.blogs') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <span class="nav-item-border "></span>
                </li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item m-0">
                            <a class="nav-link text-dark btn" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item border border-dark rounded-3">
                            <a class="nav-link  text-dark btn" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                        </li>
                    @endif
                @else
                    <a class="text-dark fw-bold text-decoration-none d-flex align-items-center justify-content-center"
                        href="{{ url('/account') }}">
                        <img class="" src="{{ asset('uploads/avatar/' . Auth::user()->avatar) }}" alt="avatar"
                            width="40px" height="40px" style="border-radius: 50%; margin-right: 15px">
                        {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                    </a>
                @endguest
            </ul>
        </div>
    </div>
</nav>
