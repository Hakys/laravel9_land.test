@extends('layouts.landing')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header d-flex gap-2">
            <div class="flex-grow-1"><h2>{{$viewData['subtitle']}}</h2></div>
        </div>
        <div class="card-body container">
            <div class="row">
                <div class="col bg-landing">
                    <h1>Total: {{ $viewData['tpv']->amount }} €</h1>
                    <div class="row">
                        <div class="col"><h3 class="text-end">Concepto: </h3></div>
                        <div class="col-auto"><h4>{{ $viewData['tpv']->concepto }}</h4></div>
                    </div>
                </div>
                <div class="col">
                    @livewire('tpv.pasarela',['key'=>$viewData['tpv']->key])</div>
            </div>
        </div>
    </div>
@endsection
