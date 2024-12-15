@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header d-flex gap-2">
            <div class="flex-grow-1"><h2>{{$viewData['subtitle']}}</h2></div>
        </div>
        <div class="card-body">
            <div class="row">
                <h3>Crear Pago</h3>
                @livewire('tpv.create')
                <h3>Tabla de Pagos</h3>
                @livewire('tpv.table')
            </div>
        </div>
    </div>
@endsection
