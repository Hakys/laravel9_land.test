@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card">
    <div class="card-header d-flex">
        <div class="flex-grow-1"><h2>{{$viewData['subtitle']}}</h2></div>
    </div>
    <div class="card-body">
        <div class="d-flex"> 
            <div class="flex-grow-1">@livewire('direccion.select2',[$viewData['reunion']->direccion->getId()])</div>
        </div>
        <div class="row">
            @livewire('reunion.show',[$viewData['reunion']->getId()])
        </div>
    </div>
</div>
@endsection