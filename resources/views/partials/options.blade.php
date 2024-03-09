


<section class=" my-5  ">


  
  <div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center">
    <div class="row gy-5">
      
   

      

      <button type="button" class="btn btn-success">
        <a href="{{ route('profile', ['id' => session('employe')->id]) }}" style="color: aliceblue">
          Accueil
        </a>
     </button>
        

 <button type="button" class="btn btn-success">  <a href="{{route('indica')}}"   style="color: aliceblue">  ajouter_un_indice  </a> </button>  

      
      
<button type="button" class="btn btn-success" form="myForm" > <a href="{{route('inserer_reel')}}"   style="color: aliceblue"> saisie_les_données (Reel) </a> </button>


 <button type="button" class="btn btn-success" form="myForm" > <a href="{{route('inserer_taux')}}"   style="color: aliceblue"> saisie_les_données (Taux) </a> </button>
   


      
<button type="button" class="btn btn-success" form="myForm" > <a href="{{route('pro.inserer')}}"   style="color: aliceblue"> ajout_processuse </a> </button>


<button type="button" class="btn btn-success" form="myForm" > <a href="{{route('periode.inserer')}}"   style="color: aliceblue"> ajout_période </a> </button>


{{--@if (session('employe')->admin ===1)
<button type="button" class="btn btn-success" form="myForm" > <a href="{{route('employe.inserer')}}"   style="color: aliceblue"> Ajouter_un_employé </a> </button>
@endif
--}}
</div>
</div>
</section>
  