@props(['data','type'])

@if ($data)
    
@php 



@endphp

<div class="formulaire m-3 rounded text-center ">
  
  
  <form method="POST"  id="monFormulaire"    action="{{route('index5')}}"    class="my-3" >
      @csrf

      <input type="hidden" name="type" value="{{$type}}">


    <h2>  @if($type == 'REEL')  {{$data[0]->reels->indice}}  @else   {{$data[0]->tauxes->indice}}  @endif : </h2> 
    
@php
    $i =0 ;
@endphp


@foreach ($data as $item)


<div class="border p-0 m-3 rounded">
  
  <div class="div   my-5 mx-5">

   {{-- <input type="text" id="id" name="id-{{$i}}"  class="form-control"> --}}
    </h6>    date : {{ $item->datevals->date }}  </h6> 
    
  </div> 

   <div class="div  input-box my-2 mx-5">
    
      <input type="number" id="obj" name="objectif-{{$i}}"  class="form-control" step="any">
      <label for="obj">Objectif :   </label> 
      
    </div>
    <div class="div  input-box my-5 mx-5">
    
      <input type="number" id="tol" name="tolerance-{{$i}}"  class="form-control"  step="any">
      <label for="tol">tolerance/seuil :  </label> 
      
    </div> 

</div>
    

<input type="hidden" id="id" name="date_id_{{$i}}" value="{{$item->date_id}}">

<input type="hidden" id="id" name="indice_id_{{$i}}" value="{{$item->indicateur_id}}" >


@php
    $i++ ;
@endphp



@endforeach


  <div class="div  "> 
    <button class="button"  onclick="sauvegarderFormulaire()" type="submit">valider</button>
  </div>


  </form>


</div> 


@endif

<script src="{{ asset('js/mon-script.js') }}"></script> 
