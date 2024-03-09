@props(['indice','resultat'])
  
  

  <h2 class="text-center mt-5">  indice : {{$indice}}    </h2>

<div  class="beta">

  @php

$month =[];

      foreach ($resultat as $item) {

        $timestamp = strtotime($item->periode);

        $monthName = date("F", $timestamp);

       array_push($month ,$monthName) ; 

      }
   
  @endphp

  @php
      

      $real =[];

      $objectiv = [] ;

foreach ($resultat as $item) {

  $valeur = $item->valeur;

  array_push($real ,$valeur) ; 

  $obje = $item->objectif ;

  array_push($objectiv ,$obje) ; 

}
  @endphp

<table class="table table-bordered" >

<tr>
<th> période/concerné</th>
<th>objectif_période</th>
<th>objectif_cumulé</th>
<th>tolérance/seuil</th>
<th> réalisation </th>
<th> réalisation période n-1 </th>
<th>réalisation cumulé</th>
<th> EVO période/période n-1</th>
<th> TRO période</th>
<th> TRO cumulées</th>
<th>Alerte</th>
</tr>
@if ($resultat)
    
@foreach ($resultat as $res)
<tr>
   <td>{{$res->periode}}</td>
    <td>{{$res->objectif}}</td>
    <td>{{$res->objectif_cumule}}</td>
    <td>{{$res->tolerance_seuil}}</td>
    <td>{{$res->valeur}}</td>
    <td>{{$res->realisation_n_1}}</td>    
    <td>{{$res->realisation_cumule}}</td>
    <td>{{$res->evo}}</td>
    @php

    if($res->objectif == 0 ||$res->objectif == NULL  ) {
     
    $calcul_1 = "IND";

    }else{

      $calcul_1 =($res->valeur/$res->objectif)*100 ;
   }
        
    @endphp
    <td>{{$calcul_1}}%</td>
    @php

 if($res->objectif_cumule == 0 ){

  $calcul_2 = "IND" ;

 }else{

  $calcul_2 = ($res->realisation_cumule/$res->objectif_cumule)*100 ;
 }

        

    @endphp
    <td>{{$calcul_2}}%</td>
    <td>

      @if ($res->valeur<$res->tolerance_seuil)
      <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        
      @else
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16" width="400 px" height="300 px" >
        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
      </svg>
      
      @endif
       </td>


</tr>
@endforeach

@endif


</table>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h3 class="text-center"> Graphique </h2>

  <h4 class="text-center"> Réalisation/objectif </h4>

<div style="width: 80%; margin: 0 auto;">
  <canvas id="myChart"></canvas>
</div>

    <script>
        window.addEventListener('load', function() {
        var data = {
            labels:  @json($month),
            datasets: [{
                label: 'Les réalisation ',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data:  @json($real)
            } ,


            {label: 'Les objectif',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data:  @json($objectiv)
        }
        ]
        };

        // Configuration du graphique
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Créer un graphique à barres
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
      });
    </script>

<h4 class="text-center"> TRO </h4>


@php
    
$real_1 = [] ;
$real_2 = [] ;

foreach ($resultat as $item) {

  
array_push($real_1, $item->valeur/$item->objectif) ;

array_push($real_2, $item->realisation_cumule/$item->objectif_cumule) ;

}

@endphp

<div style="width: 80%; margin: 0 auto;">
  <canvas id="myChart_1"></canvas>
</div>

    <script>
        window.addEventListener('load', function() {
        var data = {
            labels:  @json($month),
            datasets: [{
                label: 'TRO_période ',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data:  @json($real_1)
            } ,


            {label: 'TRO_cumulé ',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data:  @json($real_2)
        }
        
        
        ]
        };

        // Configuration du graphique
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Créer un graphique à barres
        var ctx = document.getElementById('myChart_1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
      });
    </script>

<div>