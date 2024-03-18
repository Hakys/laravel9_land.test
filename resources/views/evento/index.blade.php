@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Eventos
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Manage Eventos
        </div>
        <div class="card-body">
            {{$viewData['eventos']}}
        </div>
    </div>
@endsection
