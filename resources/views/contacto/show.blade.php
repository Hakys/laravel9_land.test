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
                    <div class="d-flex flex-row-reverse align-self-center gap-2">                        
                        <form method="POST" action="{{ route('contacto.delete', $viewData['contacto']->getTelefono()) }}">
                            @csrf
                            @method('DELETE')
                            <button id='btn_delete' class="btn btn-danger" onclick="confirmDelete('btn_delete')">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                        
                        @livewire('contacto.form-modal',['op'=>'edit','contacto'=> $viewData['contacto']])
                    
                        <a href="https://wa.me/{{ $viewData['contacto']->getTelefono() }}?">
                            <img height="38" alt="Chat on WhatsApp" class="rounded-start"
                            src="{{ asset('/storage/WhatsAppButtonGreenLarge.png') }}" >
                        </a>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2">     
            <div class="col-md-8">
                @livewire('direccion.index',['contacto'=> $viewData['contacto']])       
            </div>
        </div>            
        <div class="col-md-4">
        </div>
    </div>
@endsection
