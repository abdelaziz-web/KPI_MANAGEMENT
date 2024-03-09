



@extends('layoutes.layout')
@section('title')
    donné
@endsection
@section('style')
<link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">  
@endsection
@section('content-1')
@if(session('message'))
<div class="alert alert-danger text-center" role="alert">
        {{ session('message') }}
</div>
@endif
    <x-card-saisie-indice  :Table="$Table" :type="$type" :dernier_saisie="$dernier_saisie" />
@endsection
@section('content-2')
   {{--  @include('partials.options') --}} 


@if (session('employe')->admin == 1)

<div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center">
    <div class="row gy-5">
      <button type="button" class="btn btn-success">
        <a href="{{ route('admin') }}" style="color: aliceblue">
          Controle
        </a>
     </button>
        </div>
        </div>

@endif

@if (session('employe')->admin == 2)

@include('partials.options')

@endif
   

@endsection


    
