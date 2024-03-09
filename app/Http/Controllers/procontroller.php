<?php

namespace App\Http\Controllers;

use App\Models\processuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class procontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = processuse::all();
        return $pro ;
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
     * @param  \App\Models\processuse  $processuse
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
    return view('form_processus') ;

    }



    public function forminserer(Request $request)
    {
    
       
        $designation_processus = $request->designation_processus ;
     
       
  
        $rules = [
          'designation_processus' => 'required',
        ];
  
        $messages = [
          'required' => 'Le champ :attribute est requis.',
          
      ];
  
      $this->validate($request, $rules, $messages);
  
        // Utilisation de la méthode create() pour insérer une nouvelle entrée
       
     
        $pro = DB::table('processuses')->insert([
        'designation_processus' => $designation_processus ,
      ]);
  
   
      
      return  redirect()->route('pro.inserer')->with(['success'=>'l enregistrement est réussi ']);
  
   

    }

    
    



}
