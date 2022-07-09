<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>

<body class="{{ Request::is('login') ? 'auth-body' : 'body' }}">
    <div id="app">
        <div class="navbar-container">
            <nav class="navbar {{ Request::is('/') ? '' : 'auth-navbar' }}">
                <div class="container-navbar">
                    @if (Request::is('/'))
                        @if (Route::has('login'))
                            <span></span>
                            @auth
                                <a class="nav-link navbar-btn index-btn" href="{{ route('home') }}">Home</a>
                            @else
                                <a class="nav-link navbar-btn index-btn" href="{{ route('login') }}">Login</a>
                            @endauth
                        @endif
                    @else
                        @if (Request::is('login'))
                            <a class="navbar-brand navbar-btn" href="{{ url('/') }}">
                                <img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                        @endif

                        <!-- Authentication Links -->
                        @guest
                            <a class="nav-link navbar-btn nav-link-auth"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        @else
                            <div class="logo">
                                {{-- Hamberger Icon --}}
                                <a href="javascript:void(0)" class="hamburger"><span></span></a>
                                {{-- LOGO --}}
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="" srcset="">
                                </a>
                            </div>
                            {{-- Side Navigation Bar --}}
                            <div class="sidebar-menu">
                                <span class="close"></span>
                                <div class="sidebar-container scrollbar-styling">
                                    <a href="{{ route('index') }}" class="menu-logo"><img
                                            src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                                    <ul>
                                        <li><a href="{{ route('company.index') }}">Company</a></li>
                                        <li><a href="{{ route('employee.index') }}">Employee</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="top-right-links">
                                <a class="expand-more Expand expand"
                                    href="javascript:void(0)">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a style="display:none;" class="logout-btn" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }} </a></li>
                                </ul>

                            </div>
                            <form style="display: none;" id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        @endguest
                    @endif

                </div>
            </nav>
        </div>


        <main class="py-4 {{ Request::is('login') ? 'auth-main' : '' }}">
            @yield('content')
        </main>
    </div>
</body>

</html>
