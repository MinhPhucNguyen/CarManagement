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
                    <a class="nav-link text-dark btn" href="">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark btn" href="">Become a car owner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark btn" href="">Blog</a>
                </li>
                <li class="nav-item">
                    <span class="nav-item-border "></span>
                </li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item m-0">
                            <a class="nav-link text-dark btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item border border-dark rounded-3">
                            <a class="nav-link  text-dark btn" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        </li>
                    @endif
                @else
                    <img class="" src="{{ asset('uploads/avatar/' . Auth::user()->avatar) }}" alt="avatar"
                        width="35px" height="35px" style="border-radius: 50%; margin-right: 0">
                    <li class="nav-item dropdown d-inline-block" style="margin-left: 16px">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark fw-bold" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item  mb-2 text-danger" href="{{ route('logout') }}"
                                class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                {{ __('Logout') }}
                            </a>
                            @if (Auth::user()->role_as == '1')
                                <a class="dropdown-item   mb-2" href="{{ url('admin/dashboard') }}"
                                    class="btn btn-secondary">
                                    {{ __('Back to Dashboard') }}
                                </a>
                            @endif
                        </div>
                        @include('auth.logoutModal')
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
