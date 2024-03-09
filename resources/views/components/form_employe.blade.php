
@props(['id'])


@if(session('success'))
  <div class="alert alert-success text-center">
        <h4>  {{ session('success') }}  </h4>   
  </div>
@endif

@if(session('id'))
  <div class="alert alert-success text-center">
        <h4> ID : {{ session('id') }}  </h4>   
  </div>
@endif

@if(session('password'))
  <div class="alert alert-success text-center">
        <h4> password : {{ session('password') }}  </h4>   
  </div>
@endif

<div class="formulaire my-5  ">

    <form method="POST" action="{{route('employe.reussi')}}"   enctype="multipart/form-data" >
        @csrf
        @method('POST')
    
   
   @if (isset($id))

     <h2 class="text-center">Modifier</h2>
     <input type="hidden" name="id" value="{{$id}}">

     @else

     <h2 class="text-center">Ajouter_nouveau_employé</h2>

     @endif

      <div class="div  input-box m-5 ">
        <input type="text" id="nom" name="nom">
        <label for="nom  "> nom : </label>
      </div>

      @error('nom')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="div  input-box m-5 ">
        <input type="text" id="prenom" name="prenom">
        <label for="prenom  "> prenom : </label>
      </div>
      @error('prenom')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    
    <div class="div  input-box m-5  ">
   <input type="password" id="password" name="password">
   <label for="password  ">password: </label>
    </div> 
      
   
   @error('password')
   <div class="alert alert-danger">{{ $message }}</div>
   @enderror

  
    <div class="div  input-box m-5  ">
      <input type="email" id="password" name="email">
      <label for="password  ">email: </label>
    </div>
    
   

    <label for="processus" class ="mt-3 mb-0">  Status :</label>
      <select class="form-select mb-4 mt-2 " aria-label="Disabled select example" name="STATUS" >
       
        <option value="Stagiaire"> Stagiaire </option>
        <option value="Permanant"> Permanant </option>
      </select>
    
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        



        @php
           $service = session('service');
        @endphp

      <input type="hidden" name="service_id" value="{{$service->id_service}}">

      <div class="mb-3">
        <label for="formFile" class="form-label">choisir une image</label>
        <input class="form-control" type="file" id="formFile" name="image">
      </div>

      <div> Etat :   </div>
       
      
      <div class="form-check">
        <input class="form-check-input " type="radio" name="admin" id="flexRadioDefault2" value=1 >
        <label class="form-check-label " for="flexRadioDefault2">
         Admin
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input " type="radio" name="admin" id="flexRadioDefault1"  value=0 checked  >
        <label class="form-check-label " for="flexRadioDefault1">
         invité
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input " type="radio" name="admin" id="flexRadioDefault1"  value= 2  >
        <label class="form-check-label " for="flexRadioDefault1">
         Normale
        </label>
      </div>
  

      <div class="div  "> 
        <button class="button" type="submit">Enregistrer</button>
      </div>

    </form>
</div>  