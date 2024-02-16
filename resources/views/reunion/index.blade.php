@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <h2>Reuniones Tuppersex</h2>
    </div>
    @include('reunion.schedule')
@endsection