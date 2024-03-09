<?php

namespace App\Http\Controllers;

use App\Models\tauxe;
use App\Models\reel;
use Illuminate\Http\Request;
use App\Http\Requests\indicarequest;
use App\Models\service_reel;
use App\Models\service_taux;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class indicacontro extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form_creat()
    {
       
           $pro = new procontroller();
           $process =  $pro->index();
           $per = new periocontroller();
           $periode =  $per->index();

        return view('form_indice',compact('process','periode'));
    }

    public function form_inserer()
    {
        return view('affichage_saisai');
    }
// ------------------------------------------------------------------------------------------------------------------------------------

    public function  saisie(Request $request)
    {


        $data = unserialize($request->data);


        $type = $request->type ;

        $var = 1 ;

        return view('saisie',compact('data','type','var'));
    }
//-----------------------------------------------------------------------------------------------------------------------------------
 


    public function store(indicarequest $request)
    {
        
        $indice = $request->indice ;
        $designation_indice = $request->designation_indice ;
        $process_id = $request->processus ;
        $period_id	 = $request->periode ;
        $employe_id = $request->employe_id; 

        $date = Carbon::now();
        $date1 = $date->format('Y-m-d');


        $date_object = DB::table('datevals')
                ->where('date', '=', $date1)
                ->first();

          if ($date_object) {
            
            $date_id = $date_object->id_date ;

          } else {
             
            $date_id = DB::table('datevals')->insertGetId([
                'date' => $date1,
            ]);

           }


        


        if($request->flexRadioDefault=="REEL"){
      
           $newindica = reel::create([
                'designation_indice' => $designation_indice ,
                'process_id' => $process_id ,
                'period_id'=> $period_id ,
                'employe_id' => $employe_id,
                'indice' => $indice
             ]);
        
             $sertaux = new servicereel();
             $sertaux->store(['indicateur_id'=>$newindica->id_indicateur,'service_id'=>$request->service_id]);

             $date_id = DB::table('reels_datevals')->insert([
                'indicateur_id' => $newindica->id_indicateur ,
                'date_id'=> $date_id 
            ]);

         }
        else{
                 
            $newindica = tauxe::create([
            'designation_indice' => $designation_indice ,
            'process_id' => $process_id ,
            'period_id' => $period_id ,
            'employe_id' => $employe_id,
            'indice' => $indice
         ]);
           
         $sertaux = new ServiceTauxController();
         $sertaux->store(['indicateur_id'=>$newindica->id_indicateur,'service_id'=>$request->service_id]);

         $date_id = DB::table('taux_datevals')->insert([
            'indicateur_id' => $newindica->id_indicateur ,
            'date_id'=> $date_id
        ]);

         

        }
        return redirect()->route('indica')->with('message','l_indice est bien ajouté');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tauxe  $tauxe
     * @return \Illuminate\Http\Response
     */
    public function show_saisie()
    {
        

        $service = session('service');

        $Table = [] ;

       $indicateurs = DB::table('reels_service')
          ->where('service_id','=',$service->id_service )
          ->get();

  

     if($indicateurs == NULL)  {

      $Table =NULL ;

      $type = 'reel' ;

      return view('donne_non_saisie',compact('Table','type')) ;   

     }

     $date =[] ;

     $dernier_saisie = [] ;


        foreach($indicateurs as $indicateur){


        $id = $indicateur->indicateur_id ;
 
        $resultat1 = DB::table('reels_datevals')
        ->where('indicateur_id' ,'=',$id)
        ->get();





    $date = $resultat1 ;

    $this->show_saisie2($date) ;

    $resultat1 = DB::table('reels_datevals')
    ->where('indicateur_id' ,'=',$id)
    ->where('valeur', '=', NULL)
    ->get();

   $resultat100 = DB::table('reels_datevals')
    ->where('indicateur_id' ,'=',$id)
    ->where('valeur', '!=', NULL)
    ->get();

    $date = [] ;

    foreach($resultat100 as $resultat){

      $resultat200  = DB::table('datevals')
      ->where('id_date', '=',$resultat->date_id )
      ->get() ;

      array_push($date , $resultat200[0]->date) ;
    
     }

    if($date!=NULL){

    array_push($dernier_saisie ,  max($date)) ;

    }else{

      array_push($dernier_saisie , 'la premiére donnée') ;
    }


      $date = [] ;
      $date_id = [] ;
       
      

       foreach($resultat1 as $resultat){

       $resultat3  = DB::table('datevals')
       ->where('id_date', '=',$resultat->date_id )
       ->get() ;

       array_push($date , $resultat3[0]->date) ;
       array_push($date_id , $resultat3[0]->id_date) ;


      }
  
      
  

 $resultat2 = DB::table('reels')
 ->where('id_indicateur', '=' ,$id )
 ->get() ;

unset($table) ; 

$table = array($id , $date_id, $resultat2[0]->indice,$date) ;

array_push($Table, $table);

}


   

//$this->show_show($Table) ;

$type ='reel' ;

//dd($dernier_saisie) ;

    
return view('donne_non_saisie',compact('Table','type','dernier_saisie')) ; 

 }





public function show_show(){

 

  $service = session('service');
 
      $type = 'taux' ;
   
      $table = NULL ;

      $Table = [] ;

      $indicateurs = DB::table('taux_service')
                   ->where('service_id','=',$service->id_service )
                   ->get();
    

       if($indicateurs == NULL)  {

       $Table =NULL ;
              
       return view('donne_non_saisie',compact('Table','type')) ; 
           
       }

       $dernier_saisie = [] ;

        foreach($indicateurs as $indicateur){


        $id = $indicateur->indicateur_id ;
 
        $resultat1 = DB::table('taux_datevals')
        ->where('indicateur_id' ,'=',$id)
        ->get();


       $data = $resultat1 ;

      
       $this->show_saisie3($data) ;


       $resultat1 = DB::table('taux_datevals')
       ->where('indicateur_id' ,'=',$id)
       ->where('valeur', '=', NULL)
       ->get();


       $resultat100 = DB::table('taux_datevals')
       ->where('indicateur_id' ,'=',$id)
       ->where('valeur', '!=', NULL)
       ->get();
   
       $date = [] ;
   
       foreach($resultat100 as $resultat){
   
         $resultat200  = DB::table('datevals')
         ->where('id_date', '=',$resultat->date_id )
         ->get() ;
   
         array_push($date , $resultat200[0]->date) ;
       
        }
   
       if($date!=NULL){
   
       array_push($dernier_saisie ,  max($date)) ;
   
       }else{
   
         array_push($dernier_saisie , 'la premiére donnée') ;
       }
   
       $date = [] ;
       $date_id = [] ;
       

       foreach($resultat1 as $resultat){

       $resultat3  = DB::table('datevals')
       ->where('id_date', '=',$resultat->date_id )
       ->get() ;

       array_push($date , $resultat3[0]->date) ;
       array_push($date_id , $resultat3[0]->id_date) ;
       

      }
  
 $resultat2 = DB::table('tauxes')
 ->where('id_indicateur', '=' ,$id )
 ->get() ;

if($table != NULL){

unset($table) ; 

    }

$table = array($id , $date_id, $resultat2[0]->indice,$date) ;

array_push($Table, $table);

}






return view('donne_non_saisie',compact('Table','type','dernier_saisie')) ; 
      
    }  


   

    public function show_taux($reel)
    {
        $post = tauxe::find($reel);
        return  $post ;

    }

    public function show_reel($reel)
    {
        $post = reel::find($reel);
        return  $post ;
    }

    public function pagination($indice)
    {

         $service = session('service') ;
         $emloye = session('employe') ;    


        $reel = [] ; 
       
        $filteredQuery = service_reel::where('service_id', $service->id_service)->get(); 
  
        $indicateur = new indicacontro();
         
        foreach($filteredQuery as $filtre){
  
           $Reel = $indicateur->show_reel($filtre->indicateur_id) ; 
  
          array_push($reel, $Reel);
  
        }
  
      $filteredQuery = service_taux::where('service_id', $service->id_service)->get();
  
        foreach($filteredQuery as $filtre){
  
          $Reel = $indicateur->show_taux($filtre->indicateur_id) ; 
  
         array_push($reel, $Reel);
  
       }

       $nbr_page = intdiv(count($reel), 8);
      
       if(count($reel)% 8 !=0)  $nbr_page++ ;

       return view('authentifié2', compact('reel' , 'nbr_page', 'indice')) ;

    }


public function show_saisie2( $date ){


 $date_1 = [] ;



 foreach($date as $date_0){
  
 array_push($date_1, $date_0->date_id);

 }


 for($i=0;$i<count($date_1);$i++){

   $date_10 =  DB::table('datevals')
  ->where('id_date', '=', $date_1[$i])
  ->get() ;
  
  $date_1[$i] = $date_10[0]->date ;
 }

 $max_date = max($date_1) ;

 
 $today = Carbon::now(); 

 $today->startOfDay();

  $indicateur = DB::table('reels')
  ->where('id_indicateur', '=', $date[0]->indicateur_id )
  ->get() ;



 $periode = DB::table('periodes')
 ->where('id_periode', '=', $indicateur[0]->period_id )
 ->get() ;


 $dure = $periode[0]->duree ;  
 $id_indicateur = $indicateur[0]->id_indicateur ;
 
 unset($indicateur,$periode);
 

$max_date = Carbon::parse($max_date);

$i=0 ;
$s=0 ;

while(($max_date->lt($today)) && ($max_date->notEqualTo($today))){

   if($i == 0){

   $max_date = $max_date->addDays($dure);
   $i = 1;

   }else{
   
   $existe_0 = DB::table('datevals')->where('date','=', $max_date->format('Y-m-d'))->first();

   if($existe_0){
      
    $test = DB::table('reels_datevals')->where('indicateur_id','=',$id_indicateur )
                                        ->where('date_id','=',$existe_0->id_date)
                                        ->first() ;
    
   if ($test == NULL ){

    DB::table('reels_datevals')->insert([
      'indicateur_id' => $id_indicateur,
      'date_id' => $existe_0->id_date,   
  ]);
}
   }else{

   $id= DB::table('datevals')->insertGetId([
      'date' => $max_date->format('Y-m-d'),
  ]);
  

   DB::table('reels_datevals')->insert([
      'indicateur_id' => $id_indicateur,
      'date_id' => $id ,
  ]);
  }
  
$max_date->addDays($dure);

}


   }

}



public function show_saisie3($date){

  $date_1 = [] ;


  foreach($date as $date_0){
   
  array_push($date_1, $date_0->date_id);
 
  }
 
 
  for($i=0;$i<count($date_1);$i++){
 
    $date_10 =  DB::table('datevals')
   ->where('id_date', '=', $date_1[$i])
   ->get() ;
   
   $date_1[$i] = $date_10[0]->date ;
  }
 
 

  $max_date = max($date_1) ;
 
  
  $today = Carbon::now(); 
 
  $today->startOfDay();

 
 
   $indicateur = DB::table('tauxes')
   ->where('id_indicateur', '=', $date[0]->indicateur_id )
   ->get() ;
   
 
  $periode = DB::table('periodes')
  ->where('id_periode', '=', $indicateur[0]->period_id )
  ->get() ;
 
 
  $dure = $periode[0]->duree ;  
  $id_indicateur = $indicateur[0]->id_indicateur ;
  
  unset($indicateur,$periode);
  
 
  $max_date = Carbon::parse($max_date);
 
  $i=0 ;
 

  while(($max_date->lt($today)) && ($max_date->notEqualTo($today))){

    if($i == 0){
 
    $max_date = $max_date->addDays($dure);
    $i = 1;
 
    }else{
    
    $existe_0 = DB::table('datevals')->where('date','=', $max_date->format('Y-m-d'))->first();
 
    if($existe_0){
       
     $test = DB::table('taux_datevals')->where('indicateur_id','=',$id_indicateur )
                                         ->where('date_id','=',$existe_0->id_date)
                                         ->first() ;
     
    if ($test == NULL ){
 
     DB::table('taux_datevals')->insert([
       'indicateur_id' => $id_indicateur,
       'date_id' => $existe_0->id_date,   
   ]);
 }
    }
    
    else{
 
    $id= DB::table('datevals')->insertGetId([
       'date' => $max_date->format('Y-m-d'),
   ]);
   
 
    DB::table('taux_datevals')->insert([
       'indicateur_id' => $id_indicateur,
       'date_id' => $id ,
   ]);
   }
   
 
    $max_date->addDays($dure);
    }
  
}


} 


public function nouvaeau(Request $request){

   $c=1 ;

   $donneesDuFormulaire = $request->all();
 

   $array = array_values($donneesDuFormulaire);
  
  
  //dd($donneesDuFormulaire) ;
 
   
    for($i=2 ;$i<count($array) ; $i++){

      if(!is_null($array[$i])){
     
         if(!($this->test($array[$i]))) {

          $array[$i] = NULL ;
         
          $c = 0;        
         }

         if(is_null($array[$i+1])){
          $c=0;
          $array[$i] = NULL ;
        }
        if(is_null($array[$i+2])){
          $c=0;
          $array[$i] = NULL ;
        }
          }
                    
          $i = $i+4 ;
          
        }

       

 for($i=2 ;$i<count($array) ; $i++){

  if(!is_null($array[$i])){
 
  $nombreDeLignesMisesAJour = DB::table('reels_datevals')
      ->where('indicateur_id', '=',$array[$i+4])
      ->where('date_id', '=',$array[$i+3] )
      ->update([
        'valeur' => $array[$i],
      //  'objectif' => $array[$i+1],
      //  'tolerance_seuil' =>$array[$i+2]
       ]);

      }
      
      $i = $i+4 ;
      
    }

  

if($c)    
 return redirect()->route('inserer_reel');
else
return redirect()->route('inserer_reel')->with('message','l\'une des valeurs n\'a pas enregistré .');

}


public function test($chaine){

      return preg_match('/^[0-9]+(\.[0-9]+)?$/', $chaine) === 1;
     
}




public function nouvaeau_taux(Request $request){
$p=0 ;
  
  $c=1 ;

  $donneesDuFormulaire = $request->all();

 

  $array = array_values($donneesDuFormulaire);
 
  
   for($i=2 ;$i<count($array) ; $i++){

     if(!is_null($array[$i])){
     
  
      if($this->test_2($array[$i])===1) {
  
       $parties = $this->diviser($array[$i]) ;

      if($this->test($parties[0]) && $this->test($parties[1]) &&  $parties[1]!=0){

        $valeur =($parties[0]/$parties[1]) ;
        

        if((!is_null($array[$i+1])) && (!is_null($array[$i+2]))){
        
          $nombreDeLignesMisesAJour = DB::table('taux_datevals')
                                 ->where('indicateur_id', '=',$array[$i+4])
                                 ->where('date_id', '=',$array[$i+3] )
                                 ->update([
                                  'numerateur'=>$parties[0],
                                  'denominateur'=>$parties[1],
                                   'valeur' => number_format($valeur, 3),
                                   'objectif' => NULL,
                                   'tolerance_seuil' => NULL,
                                  ]);
                                }else{

                                  $array[$i] = NULL ;
                
                                  $c = 0;

                                }

      }else{

        $array[$i] = NULL ;
        
        $c = 0;
        
     $p++;


      }
             

        }else{

          $array[$i] = NULL ;
        
           $c = 0; $p++;
      
        }
 
 
       } 
         
         $i = $i+4 ;
         
       }

  
if($c)    
return redirect()->route('inserer_taux');
else
return redirect()->route('inserer_taux')->with('message','l\'une des valeurs n\'a pas enregistré .');
 
}


    public function test_2($chaine){

      $caractere = '/';
      
      $nombreOccurrences = substr_count($chaine, $caractere);

    //  dd($nombreOccurrences) ;
      
      return $nombreOccurrences ;
    
}
 

public function diviser($chaine){
  
  $delimiteur = "/";

  // Utilisez explode() pour diviser la chaîne en parties
  $parties = explode($delimiteur, $chaine);
  
  return $parties ;

}





  }
    