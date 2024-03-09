
@props(['data','type'])

@if ($data)
    
@php 

           $date = $data[3] ;
           $date_id = $data[1] ;
           $indice_id =$data[0] ;
@endphp

<div class="formulaire m-3 rounded text-center ">
  
  
  <form method="POST"  id="monFormulaire"      @if($type == 'REEL') action="{{route('nouveau')}}" @else action="{{ route('nouvaeau_taux') }}" @endif   class="my-3" >
      @csrf

      <input type="hidden" name="type" value="{{$type}}">



    <h2> {{$data[2]}} : @if($type == 'TAUX')  (a/b) @endif</h2>
    
@php
    $i =0 ;
@endphp


@foreach ($date as $item)


<div class="border p-0 m-3 rounded">
  
  <div class="div  input-box my-5 mx-5">

    <input type="text" id="id" name="id-{{$i}}"  class="form-control">
    <label for="id">Date: {{$item}}    </label> 
    
    </div>




   <div class="div   my-2 mx-5">
    
      <input type="hidden" id="obj" name="objectif-{{$i}}"  class="form-control" step="any" value="NULL"> 
     {{-- <label for="obj">Objectif :   </label> --}}
      
    </div>
    <div class="div   my-5 mx-5">
    
      <input type="hidden" id="tol" name="tolerance-{{$i}}"  class="form-control"  step="any"   value="NULL" >
    {{--  <label for="tol">tolerance/seuil :  </label> --}}
      
    </div>

</div>
    

<input type="hidden" id="id" name="date_id_{{$i}}" value="{{$date_id[$i]}}">

<input type="hidden" id="id" name="indice_id_{{$i}}" value="{{$indice_id}}" >


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
