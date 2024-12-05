@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card-header d-flex">
        <div class="flex-shrink-0">
            <a href="javascript://" onclick="history.back();" class="btn btn-outline-gray" role="button">
                <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
            </a>
        </div>
        <div class="flex-grow-1"><h2>{{$viewData['subtitle']}}</h2></div>
        <div>
            <form method="POST" action="{{ route('reunion.delete', $viewData['reunion']->getId()) }}">
                @csrf
                @method('DELETE')
                <button id='btn_delete' class="btn btn-outline-danger" onclick="confirmDelete('btn_delete')">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="bg-danger p-2">Cliente</h4>
            @livewire('direccion.select2',[$viewData['reunion']->direccion->getId()])
            <h4 class="bg-danger p-2 mt-3">Detalles</h4>
            @livewire('reunion.show',[$viewData['reunion']->getId()])
            <h4 class="bg-danger p-2 mt-3">Pagos</h4>
            @livewire('pago.show-reunion', [$viewData['reunion']->getId()])
        </div>
    </div>
@endsection
