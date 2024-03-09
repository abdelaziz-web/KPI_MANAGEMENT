
@props(['employe'])
{{--
  
<div class="col-3 bg-light p-3 border  ">
    <img src="{{ asset('storage/app/public/profile/W5LIIn1Y74gksLSZEVohu7WmSoM7YHQyB16oc9ym.png') }}" alt="Image">
  </div>
  
  --}}

  @php
 
      $tof = $employe->photos ;
     
   @endphp

 
@if ($tof == NULL)
     
 <div class="col-3 bg-light p-3 border  ">
  <img src="https://placehold.co/600x400/000000/FFFFFF/png" alt="Image" class="image-circulaire">  
</div>

 @else
     
 <div class="col-3 bg-light p-3 border  ">
  <img src="{{ asset('storage/'.$tof) }}"  class="image-circulaire"  alt="Image">
 </div>

 @endif
  
  

  
