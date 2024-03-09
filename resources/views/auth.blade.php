<!DOCTYPE html>
<html lang="fr">
<head>
 <link rel="stylesheet" href="{{asset('css/style_conection.css')}}">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>



<main>

  <form method="POST"  action="{{route('auth')}}" >
   @csrf


    <h2>authentifier</h2>
    
 
  <div class="div  input-box   trans">
 
    <input type="text" id="id" name="id"  >
    <label for="id">id</label>
  </div>
  <div class="div   input-box ">
  
    <input type="password" id="motdepasse" name="motdepasse"  >
    <label for="motdepasse">Mot de passe </label>
  </div>

  @if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach($errors->all() as $error)
              <li   class="link-underline-danger">{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
  
  <div class="div  "> 
    <button type="submit">Valider </button>
  </div>
 
  </form>
</main>

</body>
</html>




  