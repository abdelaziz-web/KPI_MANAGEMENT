@props(['table','type','dernier_saisie'])


@php
    $i=0
@endphp

@if ($table)

@foreach ($table as $item)
    

@php

$data = serialize($item) ;

@endphp


<div class="col-sm-3 my-5 ">

  <div class=" col-sm-6 card " style="width: 18rem;">
      <ul class="list-group list-group-flush">
        <li class="list-group-item bg-light">{{$item[2]}}</li>
        @foreach ($item[3] as $date)
        <li class="list-group-item">Date : {{$date}} </li>
        @endforeach
        <li class="list-group-item">dérniére_saisi : {{$dernier_saisie[$i]}}</li>
@php
    $i++ ;
@endphp

@if ($item[3]==NULL)
    
@else
    
<li class=" list-group-item text-center my-2 " >

  <form   method="post"  action="{{route('saisie')}}" >
  @csrf

  @php
     // dd($date) ;
  @endphp
      <input type="hidden" name="data" value="{{$data}}">

      <input type="hidden" name="type" value="{{$type}}">

      <button type="submit" class="btn btn-primary"> saisir </button>

   </form>     
      
 </li>


@endif
   {{--  <li class=" list-group-item text-center my-2 " >

         <form   method="post"  action="{{route('saisie')}}" >
         @csrf
             <input type="hidden" name="data" value="{{$data}}">

             <input type="hidden" name="type" value="{{$type}}">

             <button type="submit" class="btn btn-primary"> saisir </button>

          </form>     
             
        </li>--}}

      </ul>
    </div>
  
    </div>

@endforeach

@endif