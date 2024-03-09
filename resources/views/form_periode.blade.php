@extends('layoutes.layout')
@section('style')
<link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">
<link rel="stylesheet" href="{{('css/style_formulaire.css')}}">
@endsection
@section('content-1')
 <x-form_perio/>
@endsection
@section('content-2')
 {{--   @include('partials.options') --}}
@endsection
@section('title')
    Espace_perso
@endsection