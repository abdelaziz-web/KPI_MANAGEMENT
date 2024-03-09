@if(session('success'))
  <div class="alert alert-success text-center">
        <h4>  {{ session('success') }}  </h4>   
  </div>
@endif


<div class="formulaire my-5  ">

    <form method="POST" action="{{route('forminserer')}}" >
        @csrf
        @method('POST')

      <h2 class="text-center">Ajouter_nouveau_période :</h2>



      

      <div class="div  input-box m-5 ">
        <input type="text" id="periode_name" name="periode_name">
        <label for="periode_name  "> periode_name : </label>
      </div>
      @error('periode_name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="div  input-box m-5 ">
        <input type="number" id="duree" name="duree">
        <label for="duree  "> duree : </label>
      </div>

      @error('duree')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
        
 

      <div class="div  "> 
        <button class="button" type="submit">Enregistrer</button>
      </div>

    </form>
</div>