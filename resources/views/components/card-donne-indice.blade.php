
<div class="col">
  <div class="card border-secondary my-5 " style="max-width: 18rem;">
  <div class="card-header">{{$item->indice}} |</div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">designation : </h5>
    <p class="card-text">{{$item->designation_indice}}</p>
  </div>
  <div class="card-body text-secondary  alpha">
    <h5 class="card-title">Processus : </h5>
    <p class="card-text">{{$item->processuse->designation_processus}}</p>
  </div>
  <div class="card-body text-secondary  alpha ">
    <h5 class="card-title">type : </h5>
    <p class="card-text">{{$item->type}}</p>
  </div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Periode :</h5>
    <p class="card-text">{{$item->periode->periode_name}}</p>
    <a href="{{route('table',['indice'=>$item->id_indicateur , 'type' => $item->type])}}" class="stretched-link">  </a>
  </div>
  </div>
</div>

    


