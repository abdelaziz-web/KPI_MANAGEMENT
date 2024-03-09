
@extends('layoutes.layout')
    @section('style')
    <link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">  
    @endsection


    @php
        $item  =$reel;

   
    @endphp


  @section('title')
      Affichage_indice
  @endsection




    @section('content-1')


              
            <section class="sect mt-5" >
                    
    
                  
              <div class="cantainer row row-cols-2 row-cols-md-4 g-4   alpha1">
      


                @if ($indice == $nbr_page)


                @for ($i = ($indice-1)*8; $i < ($indice-1)*8+count($reel)%8; $i++)
    
               <x-card-donne-indice  :item="$item[$i]"  />
   
                @endfor
                    
                @else
                    
                @for ($i = ($indice-1)*8; $i <= $indice*8-1; $i++)
                     

                @empty($item[$i])
                
                @else
               
                <x-card-donne-indice  :item="$item[$i]"  />

                 @endempty

   
                @endfor

                @endif
             
      </div> 

                  </section>

                  <nav aria-label="Page navigation example" class="my-5">
                    <ul class="pagination justify-content-center">
                      <li class="page-item ">

                        @if ($indice==1)

                        <a class="page-link" href="{{route('pagination',['indice'=>$indice])}}">précedent</a>
                        @else                     
                        <a class="page-link" href="{{route('pagination',['indice'=>$indice-1])}}">précedent</a>
                        @endif


                      </li>
                      
                      @for ($i = 1; $i <= $nbr_page; $i++)
                      <li class="page-item"><a class="page-link" href="{{route('pagination',['indice'=>$i])}}">{{$i}}</a></li>  
                      @endfor
                      <li class="page-item">
                        
                         
                         @if ($indice==$nbr_page)

                         <a class="page-link" href="{{route('pagination',['indice'=>$indice])}}">suivant</a>
                         @else                     
                         <a class="page-link" href="{{route('pagination',['indice'=>$indice+1])}}">suivant</a>
                         @endif

                       
                        
                      </li>
                    </ul>
                  </nav>

    @endsection
  
  
   
  

@section('content-2')

@if (session('employe')->admin == 0 ||session('employe')->admin == 1)
    
@endif

@if (session('employe')->admin == 2)
@include('partials.options')    
@endif

 

@endsection


</main>
  


    
   