<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\service_reel;
use App\Models\reels_dateval;
use App\Models\taux_dateval;
use Illuminate\Support\Facades\DB;

class AOS extends Controller
{
    

    public function index_1(){

      

      //  $resultats = taux_dateval::where('date_id', '=', 90)->get();

    //    dd($resultats[0]);
   //     dd($resultats[0]->datevals) ;        

        return view('Choix') ;

    }

    public function index_2(){

        

        $reels_dateval =  reels_dateval::where('objectif','=',NULL)->get();



        
     foreach($reels_dateval as $item){

        $postsPublies = $reels_dateval->filter(function ($item) {
            return $item->reels->services[0]->designation_service == session('service')->designation_service; // Votre condition pour les posts publiés
        });


     }
     $reels_dateval  =  $postsPublies ;
     
 //   dd($reels_dateval) ;

        $grouped = $reels_dateval->groupBy('indicateur_id');

   
       
        $type ="REEL" ;
        

        return view('objectiv',compact('grouped','type')) ;

    }

    public function index_3(){


        $taux_dateval =  taux_dateval::where('objectif','=',NULL)->get();




        foreach($taux_dateval as $item){

            $postsPublies = $taux_dateval->filter(function ($item) {
                return $item->tauxes->services[0]->designation_service == session('service')->designation_service;

            });

      /*      if(  $item->tauxes->services[0]->designation_service != session('service')->designation_service) {


                $taux_dateval->forget($item->getKey());


            }      
   */
      $taux_dateval = $postsPublies ;

        }

        $grouped = $taux_dateval->groupBy('indicateur_id');

        $type ="TAUX" ;

        return view('objectiv',compact('grouped','type')) ;

    }

    public function index_4(Request $request){

         $tmp = $request->input('data') ;

        if($request->input('type') =='REEL')

       // $donne =  reels_dateval::where('indicateur_id','=', $tmp )->get();
        $donne =  reels_dateval::where('indicateur_id','=', $tmp )
        ->where('objectif', NULL)
        ->get();

        else{

      //  $donne =  taux_dateval::where('indicateur_id','=', $tmp )->get();

      $donne =  taux_dateval::where('indicateur_id','=', $tmp )
                            ->where('objectif', NULL)
                            ->get();

        }     
        
        $data = $donne ;

        $type = $request->input('type') ;
        
        $var = 0 ;

        return view('saisie',compact('data','type','var')) ;

    }

    public function index5(Request $request ){

  
   if($request->input('type') == 'REEL' ){

  
    $array = [];

    $array = $request->input() ;

    $array = array_values($array);
   
  

    for ($i = 2; $i < count($array); $i++) {

        

        if($array[$i] == NULL || $array[$i+1] == NULL)  {

            $i = $i + 3 ;
           
            
         //   continue ;
        
           }else{               

$condition = ['indicateur_id' => $array[$i+3], 'date_id' => $array[$i+2] ]; 

$nouvellesValeurs = [
'objectif' =>  $array[$i],
'tolerance_seuil' => $array[$i+1],
];


$taux_dateval = 'reels_datevals' ;

DB::table($taux_dateval)
->where($condition)
->update($nouvellesValeurs);
    
$i = $i + 3 ;


}
}

return redirect()->route('objectiv_1');

    }else{
        $array = [];

        $array = $request->input() ;
    
        $array = array_values($array);
       
      
    
        for ($i = 2; $i < count($array); $i++) {

            
    
            if($array[$i] == NULL || $array[$i+1] == NULL)  {
    
                $i = $i + 3 ;
               
                
             //   continue ;
            
               }else{               

$condition = ['indicateur_id' => $array[$i+3], 'date_id' => $array[$i+2] ]; 

$nouvellesValeurs = [
    'objectif' =>  $array[$i],
    'tolerance_seuil' => $array[$i+1],
];


$taux_dateval = 'taux_datevals' ;

DB::table($taux_dateval)
    ->where($condition)
    ->update($nouvellesValeurs);
        
  $i = $i + 3 ;


    }
}

return redirect()->route('objectiv_2');

}

}
}