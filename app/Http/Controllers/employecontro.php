<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\service ;
use App\Models\service_reel;
use App\Models\service_taux;
use  App\Models\employe ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\reels_dateval ;
use Illuminate\Support\Facades\DB;





class employecontro extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {

       
        return view('auth');
  
    }


    public function index4()
    {
        return view('authentifié');

    }






    public function index2(Request $request )
    {     
    
       
          $id = $request->id;
          $pass = $request->motdepasse ;     
       
     $credentials  =  ['id'=> $id,'password'=> $pass];
     if (Auth()->attempt( $credentials)) {
        
        $request->session()->regenerate();

        return redirect()->route('profile',['id' => $id]);
     
    } else {
        // L'authentification a échoué
        return redirect()->back()
                         ->withErrors(['message' => 'ID ou mot de passe non valide.']) ;  
    }

    }


    public function index3($id)
    {
             

      $employe = employe::findOrFail($id);
      $service = $employe->service ;
      session(['employe' => $employe,'service' => $service ]);
      

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
      
       //calcul nombre de page

       $nbr_page = intdiv(count($reel), 8);
      
       if(count($reel)% 8 !=0)  $nbr_page++ ;
   
      
    $indice = 1 ;          
 
  //  dd($reel) ;

     return view('authentifié2',compact('reel' , 'nbr_page','indice')); 

    }



     public function logout(Request $request){


 

    \Illuminate\Support\Facades\Session::flush();

     auth::logout();

     return to_route('connexion')->with('reussi','vous étes bien déconnecté') ;

     }
    
   
    public function form_inserer($id = NULL){

     if(isset($id)){

      return view('form_employe_1',compact('id')) ;

     }else{

      return view('form_employe_1') ;

     }


    }

    public function forminserer(Request $request){
           

    if($request->input('id' ) != NULL) {
     
      $nom_employe = $request->nom ;
      $prenom_employe = $request->prenom ;
      $password = $request->password ;
      $admin	 = $request->admin ;
      $service_id = $request->service_id; 
      $email = $request->email ;
      $status = $request->STATUS ; 

   //   dd($status) ;

      if(!isset($nom_employe)){

        $nom_employe  =NULL ;
      }
      if(!isset($prenom_employe)){

        $prenom_employe =NULL ;
     }
      if(!isset($password)){

      $password  =NULL ;
    
    }
      if(!isset($email)){

      $email  =NULL ;
     }
     if ($request->file('image')) {

      $filename = $request->file('image')->store('profile','public') ;
      
     }else{
      $filename = NULL ;
     } 



     $rules = [
      'nom' => 'required|string|max:255',
      'prenom' => 'required|string|max:255',] ;

      $messages = [
        'required' => 'Le champ :attribute est requis.',
       
    ];

    $this->validate($request, $rules, $messages);

     DB::table('employes')->updateOrInsert(
      ['id' => $request->input('id' )], // Condition WHERE sur la clé primaire
      [
          'nom_employe' => $nom_employe,
          'prenom_employe' => $prenom_employe,
          'password' => bcrypt($password),
          'admin' => $admin,
          'service_id' => $service_id,
          'photos' => $filename,
          'STATUS' => $status,
          'email' => $email,
      ]
  );
  
  return  redirect()->route('employe.inserer')->with(['success'=>'l enregistrement est Modifié ',
   ]);


    }else{

      $nom_employe = $request->nom ;
      $prenom_employe = $request->prenom ;
      $password = $request->password ;
      $admin	 = $request->admin ;
      $service_id = $request->service_id; 
      $email = $request->email ;
      $status = $request->STATUS ; 


    
      $rules = [
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'password' => 'required',  
        'email' => 'required|email',
      ];

      $messages = [
        'required' => 'Le champ :attribute est requis.',
        'email'=>'définir bien email',
    ];

    $this->validate($request, $rules, $messages);



    if ($request->file('image')) {

      $filename = $request->file('image')->store('profile','public') ;
      
     }else{
      $filename = NULL ;
     } 

     
   
      $employe = DB::table('employes')->insert([
        'nom_employe' => $nom_employe,
        'prenom_employe' => $prenom_employe,
        'password' => bcrypt($password), // Assurez-vous de hacher le mot de passe
        'admin' => $admin,
        'service_id' => $service_id,
        'photos' =>$filename,
        'STATUS' =>$status ,
        'email' => $email,
    ]);

    if ($employe) {
      $id = DB::getPdo()->lastInsertId();
      }


    return  redirect()->route('employe.inserer')->with(['success'=>'l enregistrement est réussi ',
                                                       'id' =>$id,
                                                       'password' =>$password ]);

    }

  }


}
