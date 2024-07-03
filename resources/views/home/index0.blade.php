@extends('layouts.app')
@section('title', $viewData['title'])
@section('header')
@endsection
@section('content')
    <div class="row">
        <div class="col text-center m-4"> 
            <img src="{{ asset('/img/logo_diabla_roja.png') }}" 
                class="img-fluid mx-auto my-auto d-block rounded" 
                alt="Sex Shop Diabla Roja">
        </div>
    </div>
    <div class="d-flex align-items-center flex-column bg-theme text-white text-center">
        <h2>@yield('subtitle', 'App Sex Shop Diabla Roja')</h2>
    </div>
@endsection
