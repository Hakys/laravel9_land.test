@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        {{$viewData['subtitle']}}
        <div>
            <a class="btn btn-outline-secondary">
                <b>Nº de Contactos:</b> {{ $viewData['contactos']->count() }}</a>
            <a class="btn btn-success" href="{{ route("contacto.create") }}">
                <svg xmlns="http://www.w3.org/2000/svg" weight="25" height="25" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"></path>
                </svg>
            </a>
        </div>
       
    </div>
    <div class="card-body">
        <div class="row">
            <div class="text-end">
                
            </div>
        </div>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['contactos'] as $contacto)
                    <tr>
                        <td class="text-start"><a alt="Teléfono de {{ $contacto->getApodo() }}" 
                                href="{{ route("contacto.show", ['telefono' => $contacto->getTelefono()]) }}">
                                {{ $contacto->getApodo() }}</td>
                        </a><td>
                            <a alt="Teléfono de {{ $contacto->getApodo() }}" 
                                href="{{ route("contacto.show", ['telefono' => $contacto->getTelefono()]) }}">
                                {{ $contacto->getTelefono() }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@endsection