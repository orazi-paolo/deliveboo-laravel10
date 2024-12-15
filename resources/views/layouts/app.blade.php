<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/deliveroo-logo.webp') }}" type="image/webp">

    <title>Deliveboo</title>

    <!-- Fonts -->
    {{--
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('scss')
    @yield('js')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container d-flex align-items-center">
                <img src="{{ asset('images/deliveroo-logo.webp') }}" alt="Deliveboo Logo"
                    class="img-fluid d-block logo me-1">
                <a class="navbar-brand turquoise fw-bold" href="{{ url('/home') }}">
                    deliveboo
                </a>
                <a class="navbar-brand fs-6 turquoise" href="http://localhost:5173/">
                    Home
                </a>

                {{-- Navbars --}}
                @auth
                @if (auth()->user()->restaurant)
                <a class="navbar-brand fs-6 turquoise" href="{{ route('admin.plates.index') }}">
                    Plates
                </a>
                <a class="navbar-brand fs-6 turquoise" href="{{ route('admin.purchases.index') }}">
                    Purchases
                </a>
                @endif
                @endauth

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link border px-4 me-md-2 turquoise login-m" href="{{ route('login') }}">{{
                                __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link border px-4 turquoise" href="{{ route('register') }}">{{ __('Register')
                                }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle turquoise" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end turquoise" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item turquoise" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('add-script')
</body>

</html>
