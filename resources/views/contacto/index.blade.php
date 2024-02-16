@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header d-flex gap-2">
            <div class="flex-grow-1"><h2>{{$viewData['subtitle']}}</h2></div>
            <div><a class="btn btn-outline-secondary">
                <b>Nº de Contactos:</b> {{ $viewData['contactos']->count() }}</a></div>
            @livewire('contacto.form-modal',['op'=>'create'])
        </div>
        <div class="card-body">
            <div class="row">
                @livewire('contacto.index')
            </div>
        </div>
    </div>
@endsection