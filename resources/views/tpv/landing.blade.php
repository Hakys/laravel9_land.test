@extends('layouts.landing')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    @livewire('tpv.pasarela',['key'=>$viewData['tpv']->key])
@endsection
