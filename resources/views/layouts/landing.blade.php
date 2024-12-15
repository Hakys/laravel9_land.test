<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="laravel9 bootstrap5" />
    <meta name="author" content="by Hakys" />
    <title>@yield('title', ' - Diabla Roja')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
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
                <a class="navbar-brand" href="#">Diabla Roja App</a>
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
