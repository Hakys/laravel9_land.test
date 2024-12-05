@extends('layouts.app')
@section('title','Online Store')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-star fs-2 gap-4">
            <div class="fw-bolder">PROVEEDORES: </div>
            <ul>
            <li><a href="{{route('import.contacto')}}">Google Contacts</a></li>
            <li><a href="{{route('dreamlove.index')}}">DREAMLOVE</a></li>
            <li><a href="{{route('lovecherry.index')}}">LOVECHERRY</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h2>Total Productos Importados: {{$productos->count()}}</h2>
        <div class="row row-cols-auto justify-content-between g-2">
            @foreach ($productos as $p)
                <div class="col"><a href="{{ route('import.show', $p->referencia) }}">{{$p->referencia}}</a></div>
            @endforeach
        </div>
    </div>
@endsection
