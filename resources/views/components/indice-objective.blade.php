@props(['grouped','type'])


@php
    $i=0

@endphp

@if ($grouped)

@foreach ($grouped as $item)
    

@php

$tmp = $item[0];


@endphp


<div class="col-sm-3 my-5 ">

  <div class=" col-sm-6 card " style="width: 18rem;">
      <ul class="list-group list-group-flush">
    
        <li class="list-group-item bg-light">
        @if ($type == 'TAUX')
        {{$tmp->tauxes->indice}}
        @else
        {{$tmp->reels->indice}}
        @endif </li>

    
     @foreach ($item as $date)
     <li class="list-group-item">Date : {{$date->datevals->date}} </li>
     @endforeach

@php
    $i++ ;
@endphp


<li class=" list-group-item text-center my-2 " >

  <form   method="post"  action="{{route('saisie_2')}}" >
  @csrf
      <input type="hidden" name="data" value="{{$tmp->indicateur_id}}">

      <input type="hidden" name="type" value="{{$type}}">

      <button type="submit" class="btn btn-primary"> saisir </button>

   </form>     
      
 </li>


      </ul>
    </div>
  
    </div>

@endforeach

@endif