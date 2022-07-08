<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CentrikMiniCRM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>

<body class="{{ Request::is('login') ? 'auth-body' : 'body' }}">
    <div id="app">
        <div class="navbar-container">
            <nav class="navbar {{ Request::is('login') ? 'auth-navbar' : '' }}">
                <div class="container-navbar">
                    @if (Request::is('/'))
                        @if (Route::has('login'))
                            <span></span>
                            @auth
                                <a class="nav-link navbar-btn index-btn" href="{{ route('/home') }}">Home</a>
                            @else
                                <a class="nav-link navbar-btn index-btn" href="{{ route('login') }}">Login</a>
                            @endauth
                        @endif
                    @else
                        <a class="navbar-brand navbar-btn" href="{{ url('/') }}">
                            {{ config('app.name', 'CentrikMiniCRM') }}
                        </a>
                        <!-- Authentication Links -->
                        @guest
                            <a class="nav-link navbar-btn nav-link-auth" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
