@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['contacto']->getApodo() }}
                    </h5>
                    <p class="card-text">{{ $viewData['contacto']->getTelefono() }}</p>
                    <div class="d-flex flex-row-reverse align-self-center">                        
                        <form method="POST" action="{{ route('contacto.delete', $viewData['contacto']->getTelefono()) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                        <a class="me-2 btn btn-info text-white" href="{{ route('contacto.edit', $viewData['contacto']->getTelefono()) }}">
                            <i class="bi-pencil"></i>
                        </a>
                        <a class="me-2" href="https://wa.me/{{ $viewData['contacto']->getTelefono() }}?">
                            <img height="38" alt="Chat on WhatsApp" class="rounded-start"
                            src="{{ asset('/storage/WhatsAppButtonGreenLarge.png') }}" >
                        </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
