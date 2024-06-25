<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <meta name="description" content="laravel9 bootstrap5" />
    <meta name="author" content="by Hakys" />
    <title>@yield('title', ' - Diabla Roja')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="favicon.ico" /> 
    @vite(['resources/js/app.js'])
    @livewireStyles
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"     
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.11/index.global.min.js'></script>
</head>

<body class="d-flex flex-column h-100">
    <header class="masthead mb-2">    
        <!-- Navigation-->
        <nav class="navbar navbar-dark navbar-expand-lg bg-theme">     
            <div class="container">
                <a class="navbar-brand text-white" href="{{ route('home.index') }}">Diabla Roja App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">     
                        <!--<a class="nav-link" href="{{ route('home.index') }}">Home</a>-->
                        @auth
                        <a class="nav-link" href="{{ route('reunion.index') }}">Agenda TPS</a>
                        <a class="nav-link" href="{{ route('reunion.gestion') }}">Gestión TPS</a>
                        <a class="nav-link" href="{{ route('product.index') }}">Productos</a>
                        <a class="nav-link" href="{{ route('contacto.index') }}">Contactos</a> 
                        <a class="nav-link" href="{{ route('prestashop.product.index') }}">Prestashop Products</a>
                        <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                        @endauth
                        <!-- 
                        <a class="nav-link" href="{{ route('home.about') }}">About</a>
                        <a class="nav-link" href="{{ route('home.landing') }}">Landing</a> 
                        -->
                        <div class="vr bg-black mx-2 d-none d-lg-block"></div>
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login')}}</a>
                            <!--<a class="nav-link" href="{{ route('register') }}">Register</a>-->
                        @else
                            <a class="nav-link" href="{{ route('myaccount.orders') }}">My Orders</a>
                            <a class="nav-link" href="{{ route('admin.home.index') }}">Admin</a>
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="nav-link"
                                    onclick="document.getElementById('logout').submit();">Logout</a>
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('header')
        </div>        
    </header>
    <main class="flex-shrink-0 mb-4">
        <div class="container-fluid container-md">
            @include('layouts.alert')
            @yield('content')
        </div>
    </main>
    <footer class="mt-auto fixed-bottom">
        <div class="container">
            <small class="text-muted">
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://diablaroja.es">Diabla Roja</a> - <b>by Hakys</b>
            </small>
        </div>
    </footer>
    @vite('resources/js/app.js')   
    @livewireScripts 
</body>

</html>
