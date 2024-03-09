@extends('layoutes.layout')
@section('title')
    donné
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
            <a href="{{ route('profile', ['id' => session('employe')->id]) }}" style="color: aliceblue">
               Accueil
            </a>
        </button>
</div>
</div>


<div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-5">
    <div class="row gy-5">
        <button type="button" class="btn btn-success">
            <a href="{{ route('afficher') }}" style="color: aliceblue">
                Gérer les employés
            </a>
        </button>
</div>
</div>


<div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-5">
    <div class="row gy-5">
        <button type="button" class="btn btn-success">
            <a href="{{ route('metrics') }}" style="color: aliceblue">
                Gérer les indices 
            </a>
        </button>
</div>
</div>


   <div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-5">
    <div class="row gy-5">
        <button type="button" class="btn btn-success">
            <a href="{{ route('all') }}" style="color: aliceblue">
               Objectifs
            </a>
        </button>
</div>
</div>
  
 

  
 





@endsection