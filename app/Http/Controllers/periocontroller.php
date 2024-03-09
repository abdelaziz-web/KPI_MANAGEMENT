<?php

namespace App\Http\Controllers;

use App\Models\periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class periocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = periode::all();
        return $periode ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
    return view('form_periode') ;

    }

    public function forminserer(Request $request)
    {
    
       
        $periode_name = $request->periode_name ;
        $Duree = $request->duree ;
       
  
        $rules = [
          'periode_name' => 'required',
          'duree' => 'required',
        ];
  
        $messages = [
          'required' => 'Le champ :attribute est requis.',
          
      ];
  
      $this->validate($request, $rules, $messages);
  
        // Utilisation de la méthode create() pour insérer une nouvelle entrée
       
     
        $periode = DB::table('periodes')->insert([
        'periode_name' => $periode_name ,
         'duree' =>  $Duree ,
      ]);
  
   
      
      return  redirect()->route('periode.inserer')->with(['success'=>'l enregistrement est réussi ']);
  
   

    }

    
}
