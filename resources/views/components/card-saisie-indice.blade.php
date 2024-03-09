


@props(['Table','type','dernier_saisie'])

@php

      $type = strtoupper($type) ;

@endphp


<div class="mb-5 border rounded mt-3   ">

   
<h2 class="text-center" >  {{$type}}: </h2>
 
<div class="container">

    <div class="row">
       
    
<x-indice-donne  :table="$Table" :type="$type" :dernier_saisie="$dernier_saisie" />

</div>
  
    
</div>


</div>




