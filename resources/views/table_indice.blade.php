@extends('layoutes.layout')
@section('title')
  Table 
@endsection
@section('content-1')


<x-table_indice :indice="$indice_1"  :resultat="$resultat"  />

@endsection

@section('content-2')

@if (session('employe')->admin == 2)
@include('partials.options')
@endif
  
@endsection

@section('style')
    
<link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">  
<link rel="stylesheet"      href="{{asset('css/style_table.css')}}">

@endsection