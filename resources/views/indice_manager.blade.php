@extends('layoutes.layout')
@section('title')
    indice
@endsection
@section('style')
<link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">  
@endsection
@section('content-1')
    
@endsection
@section('content-2')

   {{--   @include('partials.options')    --}} 
   <div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-5">
    <div class="row gy-5">
        <button type="button" class="btn btn-success">
            <a href="{{ route('indica') }}" style="color: aliceblue">
                Ajouter_indice 
            </a>
        </button>
</div>
</div>

<div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-5">
    <div class="row gy-5">
        <button type="button" class="btn btn-success">
            <a href="{{ route('inserer_reel') }}" style="color: aliceblue">
                saisie_les_données (Reel)
            </a>
        </button>
</div>
</div>

<div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-5">
    <div class="row gy-5">
        <button type="button" class="btn btn-success">
            <a href="{{ route('inserer_taux') }}" style="color: aliceblue">
                saisie_les_données (Taux)
            </a>
        </button>
</div>
</div>

<div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-5">
    <div class="row gy-5">
        <button type="button" class="btn btn-success">
            <a href="{{ route('pro.inserer') }}" style="color: aliceblue">
                ajout_processuse
            </a>
        </button>
</div>
</div>

<div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-5">
    <div class="row gy-5">
        <button type="button" class="btn btn-success">
            <a href="{{ route('periode.inserer') }}" style="color: aliceblue">
                ajout_période
            </a>
        </button>
</div>
</div>

@endsection