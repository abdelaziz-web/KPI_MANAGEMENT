<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class Tableau_indicateur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calcul()
    {
        //
    }

  
    public function show()
    {
        
    }


    public function table($indice,$type)
    {
         

       if($type =='REEL'){

        $resultat = DB::table('reels')
        ->where('id_indicateur','=', $indice)
        ->first(); 

        $indice_1 = $resultat->indice ;

            $resultat = DB::table('reels_datevals')
            ->where('indicateur_id', $indice)
            ->where('valeur','!=',NULL)
            ->get(); 

            

          if(isset($resultat[0])){

            for($i = 0; $i<count($resultat) ; $i++){

             $date_id = $resultat[$i]->date_id ;
             $date = DB::table('datevals')
             ->where('id_date','=', $date_id)
             ->first() ;
            
             $resultat[$i]->periode =  $date->date ;
             
          }


          for($j = 0; $j<count($resultat) ; $j++){
 
           $res = $resultat[$j] ;
           $res->objectif_cumule = 0 ;
           $res->realisation_cumule = 0 ;      
    
           for($i = 0; $i < count($resultat) ;$i++){

            if($resultat[$i]->periode <= $res->periode){
                $res->objectif_cumule = $res->objectif_cumule+$resultat[$i]->objectif ;
                $res->realisation_cumule = $res->realisation_cumule+$resultat[$i]->valeur ;
            }

           }

    
           } 

           $resultat = $resultat->sortBy('periode');

           $resultat[0]->realisation_n_1 = 0;

           for($i = 1; $i < count($resultat) ;$i++){

           $resultat[$i]->realisation_n_1 =   $resultat[$i-1]->valeur ;

           }
      
 
          $resultat[0]->evo = "NULL" ;

           for($i = 1; $i < count($resultat) ;$i++){

         $resultat[$i]->evo = $this->calculerEvolution($resultat[$i-1]->valeur,$resultat[$i]->valeur) ;
 
            }

        }
        
      
    }else{

     $resultat =  $this->other($indice) ;

     $resultat_1 = DB::table('tauxes')
    ->where('id_indicateur','=', $indice)
    ->first(); 

    $indice_1 = $resultat_1->indice ;

    }
   
    return view('table_indice' , compact('indice_1','resultat'));

}


function calculerEvolution($ancienneValeur, $nouvelleValeur) {
    
    if ($ancienneValeur == 0) {
        if ($nouvelleValeur > 0) {
            return INF; 
        } elseif ($nouvelleValeur < 0) {
            return -INF; 
        } else {
            return 0; 
        }
    }

    
    $evolution = (($nouvelleValeur - $ancienneValeur) / abs($ancienneValeur)) * 100;

    return $evolution;
}


public function other($indice){

  

    $resultat = DB::table('tauxes')
    ->where('id_indicateur','=', $indice)
    ->first(); 

    $indice_1 = $resultat->indice ;

    //$indice_2 = $indice_1 ;

        $resultat = DB::table('taux_datevals')
        ->where('indicateur_id', $indice)
        ->where('valeur','!=',NULL)
        ->where('objectif','!=',NULL)
        ->get(); 

        

      if(isset($resultat[0])){

        for($i = 0; $i<count($resultat) ; $i++){

         $date_id = $resultat[$i]->date_id ;
         $date = DB::table('datevals')
         ->where('id_date','=', $date_id)
         ->first() ;
        
         $resultat[$i]->periode =  $date->date ;
         
      }


      for($j = 0; $j<count($resultat) ; $j++){

       $res = $resultat[$j] ;
       $res->objectif_cumule = 0 ;
       $res->realisation_cumule = 0 ;      

       for($i = 0; $i < count($resultat) ;$i++){

        if($resultat[$i]->periode <= $res->periode){
            $res->objectif_cumule = $res->objectif_cumule+$resultat[$i]->objectif ;
            $res->realisation_cumule = $res->realisation_cumule+$resultat[$i]->valeur ;
        }

       }


       } 

       $resultat = $resultat->sortBy('periode');

       $resultat[0]->realisation_n_1 = 0;

       for($i = 1; $i < count($resultat) ;$i++){

       $resultat[$i]->realisation_n_1 =   $resultat[$i-1]->valeur ;

       }
  

      $resultat[0]->evo = "NULL" ;

       for($i = 1; $i < count($resultat) ;$i++){

     $resultat[$i]->evo = $this->calculerEvolution($resultat[$i-1]->valeur,$resultat[$i]->valeur) ;

        }


}


return $resultat ;


}

}