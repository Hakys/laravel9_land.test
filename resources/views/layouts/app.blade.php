<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="laravel9 bootstrap5" />
    <meta name="author" content="by Hakys" />
    <title>@yield('title', 'Landing Page - Start Bootstrap Theme')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <!--<link href="{{ asset('/css/sb_landing.css') }}" rel="stylesheet" />-->
    @livewireStyles
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Online Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link active" href="{{ route('reunion.index') }}">Reuniones</a>
                    <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
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
    <!-- footer -->
    <script src="{{ asset('/js/app.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    @livewireScripts
</body>

</html>
