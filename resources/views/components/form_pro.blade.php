@if(session('success'))
  <div class="alert alert-success text-center">
        <h4>  {{ session('success') }}  </h4>   
  </div>
@endif


<div class="formulaire my-5  ">

    <form method="POST" action="{{route('forminsererpro')}}" >
        @csrf
        @method('POST')

      <h2 class="text-center">Ajouter_nouveau_processusse:</h2>

      <div class="div  input-box m-5 ">
        <input type="text" id="designation_processus" name="designation_processus">
        <label for="designation_processus  "> designation_processus : </label>
      </div>
      @error('designation_processus')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="div  "> 
        <button class="button" type="submit">Enregistrer</button>
      </div>

    </form>
</div>