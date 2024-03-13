@extends('layouts.app')
@section('title', 'Online Store')
@section('content')
    <div class="container">
        <h1>{{$producto['referencia']}}</h1>
        <h2>{{$producto['title']}}</h2>
        <div>Actualizado: {{$producto['updated_server']}}</div>
    </div>
@endsection