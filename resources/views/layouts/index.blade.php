<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.partial.metadata')
    @include('layouts.partial.vendor_link') 
    @include('layouts.partial.link')
</head>

<body>
    <div class="container bg-white">
        <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
            <div class="container-fluid">
                <a class="navbar-brand text-primary" href="/">Diabla Roja</a> 
                <div class="navbar-nav">
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login')}}</a>
                    @else
                        <a class="nav-link" href="{{ route('home.index') }}">Dashboard</a>
                        <a class="nav-link" href="{{ route('admin.home.index') }}">Admin</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link"
                                onclick="document.getElementById('logout').submit();">{{ __('Logout')}}</a>
                            @csrf
                        </form>
                    @endguest
                </div>    
            </div>
        </nav>
        <!-- Content Start --> 
       
        @yield('content')

        <!-- Content End --> 
    </div> 
    @include('layouts.partial.vendor_script')
    @include('layouts.partial.script') 
</body>

</html>