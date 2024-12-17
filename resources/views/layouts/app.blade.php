<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="description" content="App Diabla Roja Web Services" />
    <meta name="author" content="by Hakys" />
    <title>@yield('title', ' - Diabla Roja')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    @vite(['resources/js/app.js'])
    @livewireStyles
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.11/index.global.min.js'></script>
</head>

<body class="d-flex flex-column h-100">
    <header class="masthead mb-2">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-sm navbar-dark bg-theme">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Diabla Roja App</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex" id="collapsibleNavId">
                <ul class="navbar-nav w-100 me-auto mt-2 mt-lg-0 align-items-end">
                    <!--
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Inicio
                            <span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login')}}
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="ddContactos"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Contactos</a
                        >
                        <div
                            class="dropdown-menu align-self-center"
                            aria-labelledby="ddContactos"
                        >
                            <a class="dropdown-item" href="{{ route('contacto.index') }}"
                                ><i class="fa fa-list me-2" aria-hidden="true"></i>Lista de Contactos</a
                            >
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="ddTuppersexs"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Tuppersex</a
                        >
                        <div
                            class="dropdown-menu align-self-center" aria-labelledby="ddTuppersexs"
                        >
                            <a class="dropdown-item"
                                href="{{ route('reunion.index') }}"
                                ><i class="fa fa-calendar me-2" aria-hidden="true"></i>Calendario</a
                            >
                            <a class="dropdown-item"
                                href="{{ route('reunion.gestion') }}"
                                ><i class="fa fa-list me-2" aria-hidden="true"></i>Gestión</a
                            >
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="ddProductos"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Productos</a
                        >
                        <div
                            class="dropdown-menu align-self-center" aria-labelledby="ddProductos"
                        >
                            <a class="dropdown-item"
                                href="{{ route('product.index') }}"
                                ><i class="fa fa-table me-2" aria-hidden="true"></i>Catálogo</a
                            >
                            <a class="dropdown-item"
                                href="#"
                                ><i class="fa fa-list me-2" aria-hidden="true"></i>Gestión</a
                            >
                            <a class="dropdown-item" href="{{ route('prestashop.product.index') }}"
                                ><i class="fa fa-download me-2" aria-hidden="true"></i>Importar de Prestashop</a
                            >
                        </div>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="{{ route('home.links') }}">Recursos Web</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="ddAdmin"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Admin</a
                        >
                        <div
                            class="dropdown-menu"
                            aria-labelledby="ddAdmin"
                        >
                            <a class="dropdown-item" href="{{ route('tpv.index') }}">Pagos TPV</a>
                            <a class="dropdown-item" href="{{ route('import.index') }}">Importador</a>
                            <a class="dropdown-item" href="{{ route('admin.home.index') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Registrar Usuario</a>
                            <a class="dropdown-item" href="{{ route('cart.index') }}">Mi Carrito</a>
                            <a class="dropdown-item" href="{{ route('myaccount.orders') }}">Mis Pedidos</a>
                            <a class="dropdown-item" href="{{ route('home.about') }}">About</a>
                            <a class="dropdown-item" href="{{ route('home.landing') }}">Landing</a>
                            <a class="dropdown-item" href="{{ route('home.links') }}">Recursos Web</a>
                        </div>
                    </li>
                    <li class="nav-item ms-auto me-2">
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a class="nav-link" role="button"
                                onclick="document.getElementById('logout').submit();">Salir</a
                            >
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
                <form class="flex-shrink-1 d-flex my-2 my-lg-0 input-group w-25">
                    <input
                        class="form-control me-sm-2"
                        type="text"
                        placeholder="Buscar"
                    />
                    <button
                        class="btn btn-primary my-2 my-sm-0"
                        type="submit"
                    >
                        Buscar
                    </button>
                </form>
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
        <div class="container-fluid">
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
