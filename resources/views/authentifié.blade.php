<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentifié</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">  


  </head>
  <body>

    
  <header>
  

     @php
      //   session(['employe' => $employe,'service' => $service ]);
         $employe = session('employe');
         $service = session('service');
     @endphp

    
  <x-nav1  :employe="$employe" :service="$service"  /> 

  </header>
    
  
  
  <main class="">
  
   <section  class="sect">
    
  <div class="cantainer row row-cols-2 row-cols-md-4 g-4   alpha1">
  
  <div class="col">
  <div class="card border-secondary mb-10 mt-5 " style="max-width: 18rem;">
  <div class="card-header">SPP1 |</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">TAUX/REEL</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode </h5>
    <p class="card-text">TAUX/REEL</p>
    <a href="{{route('table')}}" class="stretched-link">  </a>
  </div>
  </div>
  </div>

  <div class="col">
  <div class="card border-secondary mb-10 mt-5 " style="max-width: 18rem;">
  <div class="card-header">SPP1</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">TAUX/REEL</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode </h5>
    <p class="card-text">TAUX/REEL</p>
    <a href="{{route('table')}}" class="stretched-link">  </a>
  </div>
  </div>
  </div>
  
  
  
  <div class="col">
  <div class="card border-secondary mb-10 mt-5 " style="max-width: 18rem;">
  <div class="card-header">SPP1</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">TAUX/REEL</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode </h5>
    <p class="card-text">TAUX/REEL</p>
    <a href="{{route('table')}}" class="stretched-link">  </a>
  </div>
  </div>
  </div>
  
  
  
  <div class="col">
  <div class="card border-secondary mb-10 mt-5 " style="max-width: 18rem;">
  <div class="card-header">SPP1</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">TAUX/REEL</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode </h5>
    <p class="card-text">TAUX/REEL</p>
    <a href="{{route('table')}}" class="stretched-link">  </a>
  </div>
  </div>
  </div>
  
  
  <div class="col">
  <div class="card border-secondary mb-10 mt-5 " style="max-width: 18rem;">
  <div class="card-header">SPP1</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">TAUX/REEL</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode </h5>
    <p class="card-text">TAUX/REEL</p>
    <a href="{{route('table')}}" class="stretched-link">  </a>
  </div>
  </div>
  </div>

  <div class="col">
  <div class="card border-secondary mb-10 mt-5 " style="max-width: 18rem;">
  <div class="card-header">SPP1</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body card   alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">TAUX/REEL</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode </h5>
    <p class="card-text">TAUX/REEL</p>
    <a href="{{route('table')}}" class="stretched-link">  </a>
  </div>
  </div>
  </div>
  
  
  
  <div class="col">
  <div class="card border-secondary mb-10 mt-5 " style="max-width: 18rem;">
  <div class="card-header">SPP1</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">TAUX/REEL</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode </h5>
    <p class="card-text">TAUX/REEL</p>
    <a href="{{route('table')}}" class="stretched-link">  </a>
  </div>
  </div>
  </div>
  
  
  
  <div class="col">
  <div class="card border-secondary mb-10 mt-5 " style="max-width: 18rem;">
  <div class="card-header">SPP1</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">TAUX/REEL</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode </h5>
    <p class="card-text">TAUX/REEL</p>
    
  </div>
  </div>
  </div>
  
  
  <nav aria-label="Page navigation example" class="mt-5 alpha5 " >
  <ul class="pagination justify-content-center">
  <li class="page-item disabled">
    <a class="page-link">Previous</a>
  </li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item">
    <a class="page-link" href="#">Next</a>
  </li>
  </ul>
  </nav>

</section>




@include('partials.options')

</main>
  
@include('partials.footer')

    
   {{--       
  <h3 class=" text-center " > des indices a saisir :  </h3>
 
  <footer  class="fff">
  
      <div class="card mb-3 container-fluid  text-center" style="width: 100%;">
      <div class="row ">
        <div class="col">
          <div class="card-body">
            <h5 class="card-title "> indice: SPP1</h5>
            <p class="card-text">DATE : 00/00/00 <button type="button" class="btn btn-info">00/00/0000</button> </p>
            <p class="card-text">DATE : 00/00/00 <button type="button" class="btn btn-info">00/00/0000</button>  </p>
            <p class="card-text">DATE : 00/00/00 <button type="button" class="btn btn-info">00/00/0000</button> </p>
            <p class="card-text"><small class="text-body-secondary">Dérniere_saisie: 00/00/0000</small></p>
          </div>
        </div>
      </div>
      </div>
      
      </footer>


      <footer  class="fff">
  
      <div class="card mb-3 container-fluid  text-center" style="width: 100%;">
      <div class="row ">
        <div class="col">
          <div class="card-body">
            <h5 class="card-title "> indice: SPP1</h5>
            <p class="card-text">DATE : 00/00/00 <button type="button" class="btn btn-info">00/00/0000</button> </p>
            <p class="card-text">DATE : 00/00/00 <button type="button" class="btn btn-info">00/00/0000</button>  </p>
            <p class="card-text">DATE : 00/00/00 <button type="button" class="btn btn-info">00/00/0000</button> </p>
            <p class="card-text"><small class="text-body-secondary">Dérniere_saisie: 00/00/0000</small></p>
          </div>
        </div>
      </div>
      </div>
      
      </footer>



      <footer  class="fff">
  
        <div class="card mb-3 container-fluid  text-center" style="width: 100%;">
        <div class="row ">
          <div class="col">
            <div class="card-body">
              <h5 class="card-title "> indice: SPP1</h5>
              <p class="card-text">DATE :  <button type="button"  onclick="afficherFormulaire()"  class="btn btn-info">00/00/0000</button>    
                <form id="monFormulaire" style="display: none;"">
    
                  <div class="div"> <label for="num">numérateur</label>
                  <input type="number"  step="0.01" id="num" name="num">
                  </div> 
                     <div class="">  /  </div>
                    <div>  <label for="den">dénumérateur</label>
                  <input type="number"  step="0.01" id="den" name="denum">
                   </div> 
                   <div class="mt-2"> 
                  <button type="submit" >Envoyer</button>
                </div> 
                </form>
             </p>
              <p class="card-text">DATE :  <button type="button" class="btn btn-info">00/00/0000</button>  </p>
              <p class="card-text">DATE :  <button type="button" class="btn btn-info">00/00/0000</button> </p>
              <p class="card-text"><small class="text-body-secondary">Dérniere_saisie: 00/00/0000</small></p>
            </div>
          </div>
        </div>
        </div>
        
        </footer>

        <script>
          function afficherFormulaire() {
            // Rendre le formulaire visible après le clic sur le bouton
            document.getElementById("monFormulaire").style.display = "block";
          }
        </script>
      
      --}}
    
  </body>
</html>