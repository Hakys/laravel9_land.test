@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">{{ $viewData['subtitle'] }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
            <div class="modal-body p-5 pt-0">
                <form method="POST" 
                    action="{{route('contacto.update',$viewData['contacto']->getTelefono())}}">                  
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" id="apodo" name="apodo" placeholder="Apodo" 
                            value="{{ old('apodo',$viewData['contacto']->getApodo()) }}"
                            class="form-control rounded-3 @error('apodo') is-invalid @enderror" >
                        <label for="apodo">Nombre o apodo del contacto</label>
                        @error('apodo')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="telefono" name="telefono" placeholder="Teléfono" 
                            value="{{ old('telefono',$viewData['contacto']->getTelefono()) }}"
                            class="form-control rounded-3 @error('telefono') is-invalid @enderror" >
                        <label for="telefono">Teléfono</label>
                        @error('telefono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Guardar</button>
                    <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
                </form>
            </div>
        </div>
    </div>
  </div>

  @endsection