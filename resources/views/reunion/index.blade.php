@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header d-flex gap-2">
            <div class="flex-grow-1"><h2>{{$viewData['subtitle']}}</h2></div>
            <!--<div class="md- hidd"><a class="btn btn-outline-secondary">
                <b>Nº de Reuniones:</b> {{ $viewData['reunions']->count() }}</a></div>-->
            <div><a class="btn btn-success " href="{{route('reunion.create')}}">                    
                <i class="fa fa-calendar-plus-o fa-lg" aria-hidden="true"></i>
                </a></div>
            <div><a class="btn btn-info text-white" href="{{route('reunion.gestion')}}">                    
                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                </a></div>
        </div>
        <div class="card-body">
            <div class="row">
                @include('reunion.schedule')

            </div>
        </div>
    </div>
@endsection