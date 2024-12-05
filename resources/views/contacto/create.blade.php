@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="row">
    <div class="d-flex align-items-stretch border rounded">
        <div>
            <a href="javascript://" onclick="history.back();" class="btn btn-outline-gray" role="button">
                <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
            </a>
        </div>
        <div>
            <img src="{{ asset($viewData['no_image']) }}"
                alt="" class="border rounded m-2 p-2 w-full h-80 object-cover object-center">
        </div>
        <div class="p-2 w-50">
            <h5>Nuevo Contacto</h5>
            @include('contacto.form')
        </div>
        <div class="flex-grow-1 p-2">

        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
        </div>
    </div>
</div>
@endsection
