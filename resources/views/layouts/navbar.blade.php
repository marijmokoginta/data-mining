<header id="header" class="header fixed-top">
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand color-green d-flex align-items-center" href="@guest{{ route('welcome') }}@else{{ route('home') }}@endguest">
                <img src="favicon.ico" alt="smkn1gorontalo" class="me-2">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- center Side Of Navbar -->
                @auth
                <ul class="navbar-nav mx-auto">
                    @if (Auth::user()->hasAnyRole(['super-admin', 'guru']))
                    <li class="nav-item">
                        <a href="#" class="nav-link color-green">
                            {{ __('navbar.dashboard') }}
                        </a>
                    </li>
                    @if (Auth::user()->hasRole('super-admin'))
                    <li class="nav-item">
                        <a href="#" class="nav-link color-green">
                            {{ __('navbar.teacher') }}
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link color-green">
                            {{ __('navbar.student') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link color-green">
                            {{ __('navbar.profile') }}
                        </a>
                    </li>
                    @endif
                </ul>
                @endauth

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav @guest ms-auto @endguest">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>