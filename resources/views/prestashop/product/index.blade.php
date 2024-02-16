@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')
    <div class="text-center">
        @foreach ($items as $p)
            <a href="{{ route('prestashop.product.show', $p->id) }}">{{$p->id}}</a>
        @endforeach
    </div>
@endsection