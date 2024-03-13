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
    @vite('resources/css/app.css')
    @livewireStyles
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Diabla Roja App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link active" href="{{ route('reunion.index') }}">Reuniones TPS</a>
                    <a class="nav-link active" href="{{ route('product.index') }}">Productos</a>
                    <a class="nav-link active" href="{{ route('contacto.index') }}">Contactos</a>
                    <a class="nav-link active" href="{{ route('prestashop.product.index') }}">Prestashop Products</a>
                    <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
                    <a class="nav-link active" href="{{ route('home.about') }}">About</a>
                    <a class="nav-link active" href="{{ route('home.landing') }}">Landing</a>

                    <div class="vr bg-black mx-2 d-none d-lg-block"></div>
                    @guest
                        <a class="nav-link active" href="{{ route('login') }}">Login</a>
                        <a class="nav-link active" href="{{ route('register') }}">Register</a>
                    @else
                        <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a>
                        <a class="nav-link active" href="{{ route('admin.home.index') }}">Admin</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active"
                                onclick="document.getElementById('logout').submit();">Logout</a>
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <!-- header -->
    <header class="masthead">
        <div class="container">
            @yield('header')
        </div>        
    </header>
    <!-- header -->
    <div class="container my-1">
        @include('layouts.alert')
        @yield('content')
    </div>
    <!-- footer -->
    <div class="copyright text-center text-white">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://diablaroja.es">
                    by Hakys
                </a> - <b>by Hakys</b>
            </small>
        </div>
    </div>
    <!-- footer    -->
    @vite('resources/js/app.js')   
    @livewireScripts 
</body>

</html>
