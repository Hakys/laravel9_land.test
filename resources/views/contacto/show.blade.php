@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3 p-3">
        <div class="d-flex mb-3">
            <div class="flex-shrink-0">
                <a href="javascript://" onclick="history.back();" class="btn btn-outline-gray" role="button">
                    <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                </a>
            </div>
            <div class="flex-shrink-0 border p-3">
                <img src="{{ $viewData['contacto']->getAvatar() }}"
                    alt="" class="w-full h-80 object-cover object-center">
            </div>
            <div class="flex-grow-1 d-flex mb-3">
                <div class="card-body me-auto">
                    <h5 class="card-title">
                        {{ $viewData['contacto']->getApodo() }}
                    </h5>
                    <p class="card-text"><span class="fw-bold">Teléfono: </span>{{ $viewData['contacto']->getTelefono() }}</p>
                </div>
                <div class="d-flex align-items-start gap-2">
                    <a href="https://wa.me/{{ $viewData['contacto']->getTelefono() }}?" target="_blank"
                        class="btn btn-outline-success" role="button">
                        <i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i> Whatsapp
                    </a>
                    @livewire('contacto.form-modal',['op'=>'edit','contacto'=> $viewData['contacto']])
                    <form method="POST" action="{{ route('contacto.delete', $viewData['contacto']->getTelefono()) }}">
                        @csrf
                        @method('DELETE')
                        <button id='btn_delete' class="btn btn-outline-danger" onclick="confirmDelete('btn_delete')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">

                @livewire('direccion.index',['contacto'=> $viewData['contacto']])

        </div>
    </div>
@endsection
