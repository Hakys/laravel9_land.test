@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')
    <div>
        <ul>
            <li><b>Id: </b>{{$item->id}}</li>
            <li><b>Name: </b>{{$item->name}}</li>
        </ul>
        <a href="./">Regresar</a>    
    </div>
@endsection