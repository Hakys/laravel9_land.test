<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.partial.metadata') 
    @include('layouts.partial.vendor_link') 
    @include('layouts.partial.link')
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        @include('layouts.partial.spinner')
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('layouts.partial.sidebar') 
        <!-- Sidebar End -->

        <!-- Content Start --> 
        <div class="content"> 
            <!-- Navbar Start -->
            @include('layouts.partial.navbar')
            <!-- Navbar End --> 

            @yield('content')

            <!-- Footer Start -->
            @include('layouts.partial.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End --> 

        <!-- Back to Top -->
        @include('layouts.widget.backtotop')
    </div> 
    @include('layouts.partial.vendor_script')
    @include('layouts.partial.script')
</body>

</html>