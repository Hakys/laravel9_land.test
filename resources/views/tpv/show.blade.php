@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header d-flex">
                <div class="flex-shrink-0">
                    <a href="javascript://" onclick="history.back();" class="btn btn-outline-gray" role="button">
                        <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="flex-grow-1"><h2>{{$viewData['subtitle']}}</h2></div>
            </div>
            <div class="card-body">
                <div class="row">
                        @livewire('tpv.form',['key'=>$viewData['tpv']->key])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
