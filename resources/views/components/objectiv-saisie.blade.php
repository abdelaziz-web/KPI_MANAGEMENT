@props(['grouped','type'])

@php
      $type = strtoupper($type) ;
@endphp


<div class="mb-5 border rounded mt-3   ">

   
<h2 class="text-center" >  {{$type}}: </h2>
 
<div class="container">

    <div class="row">
       
    
<x-indice-objective  :grouped="$grouped" :type="$type" />

</div>
  
    
</div>


</div>




