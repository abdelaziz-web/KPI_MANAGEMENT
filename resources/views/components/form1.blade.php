
@if(session('message'))
  <div class="alert alert-success text-center">
        <h4>  {{ session('message') }}  </h4>   
  </div>
@endif


<div class="formulaire  ">

    <form method="POST" action="{{route('store')}}" >
        @csrf


      <h2>créer_un_indice</h2>



      <div class="div  input-box  ">
        <input type="text" id="indice" name="indice">
        <label for="indice  "> indice </label>
      </div>
      
    <div class="div  input-box mt-5 ">
      <input type="text" id="nom" name="designation_indice">
      <label for="nom  ">designation indice </label>
    </div>
    
     @error('designation_indice')

      <div class="bg-light text-danger text-center">

         {{$message}}

      </div>

    @enderror


    <label for="processus" class ="mt-3 mb-0">  _Processus :</label>
    <select class="form-select mb-4 mt-2 " aria-label="Disabled select example"  id="processus" name="processus" >
      
        @foreach ($process as $pro)
        <option value="{{$pro->id_processus}}"> {{$pro->designation_processus}} </option>
        @endforeach

      </select>


      @error('processus')
      <div class="bg-light text-danger text-center">

        {{$message}}

     </div>

    @enderror

     
        
    <label for="processus" class ="mt-3 mb-0">  _Periode :</label>
      <select class="form-select mb-4 mt-2 " aria-label="Disabled select example" name="periode" >
       
        @foreach ( $periode as $pro)
        <option value="{{$pro->id_periode}}"> {{$pro->periode_name}} </option>
        @endforeach


      </select>

      @error('periode')

      <div class="bg-light text-danger text-center">

        {{$message}}

     </div>

    @enderror


        @php
           $employe = session('employe') ;
           $service = session('service');
        @endphp


      <input type="hidden" name="employe_id" value="{{$employe->id}}">
      <input type="hidden" name="service_id" value="{{$service->id_service}}">



     <div> TYPE  :   </div>
       
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  value="TAUX">
        <label class="form-check-label" for="flexRadioDefault1">
          TAUX
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value=" REEL" checked>
        <label class="form-check-label" for="flexRadioDefault2">
         REEL
        </label>
      </div>
        
    
    <div class="div  "> 
      <button class="button" type="submit">Enregistrer</button>
    </div>
  
  
    </form>
</div>  