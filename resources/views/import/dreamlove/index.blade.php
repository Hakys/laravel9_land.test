@extends('layouts.app')
@section('title','Online Store')
@section('content')
    <div class="container">
        <h2>Fichero XML de DreamLove</h2>
        <ul>
            <li>Hoy: {{$hoy}}</li>
            <li>Última Subida: {{$lastUpload}}</li>
            <li><a href="{{ asset('storage/imports/dreamlove.xml') }}">Ver Archivo XML</a></li>
            <li><a href="{{ route('dreamlove.importfile') }}">Import Archivo</a></li>
            <li><a href="{{ route('dreamlove.loadfile', 300) }}">Cargar Archivo (300 productos)</a></li>

        </ul>
    </div>
    <div class="container">
        <h2>Total Productos: {{$productos->count()}}</h2>
        <div class="row row-cols-auto justify-content-between g-2">
            @foreach ($productos as $p)
                <div class="col"><a href="{{ route('dreamlove.show', $p->referencia) }}">{{$p->referencia}}</a></div>
            @endforeach
        </div>
    </div>
@endsection