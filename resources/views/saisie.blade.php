@extends('layoutes.layout')
@section('title')
    saisie
@endsection
@section('style')
<link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}"> 
<link rel="stylesheet" href="{{asset('css/style_formulaire.css')}}"> 
@endsection
@section('content-1')

    @if ($var == 1)
    <x-form2 :data='$data' :type='$type' />
    @else
    <x-form3 :data='$data' :type='$type' />
    @endif

    
@endsection



