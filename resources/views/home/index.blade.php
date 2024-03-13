@extends('layouts.app')
@section('title', $viewData['title'])
@section('header')
    <div class="d-flex align-items-center flex-column bg-primary text-white text-center">
        <h2>@yield('subtitle', 'Sex Shop Diabla Roja App')</h2>
    </div>
</header>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-2">
            <img src="{{ asset('/img/game.png') }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6 col-lg-4 mb-2">
            <img src="{{ asset('/img/safe.png') }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6 col-lg-4 mb-2">
            <img src="{{ asset('/img/submarine.png') }}" class="img-fluid rounded">
        </div>
    </div>
@endsection
