@extends('layoutes.layout')
@section('title')
    donné
@endsection
@section('style')
<link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">  
@endsection
@section('content-1')
    <x-card-saisie-indice/>
@endsection
@section('content-2')
    @include('partials.options')
@endsection