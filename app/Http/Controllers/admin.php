<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employe;
use App\Http\Controllers\employecontro;


class admin extends Controller
{
    

    public function index1()
    {

        return view('admin');
  
    }

    public function afficher()
    {

    $employes = employe::where('service_id', session('employe')->service_id)->get() ;


    return view('print_users', compact('employes'));

  
    }

    public function supprimer($id)
    {

   

        $employe = employe::find($id); 

        

        if ($employe) {

            $employe->delete();

            return redirect()->route('afficher')->with('message', 'vous avez réussi');

        } 
        
  
    }
    
    public function modifier($id)
    {

      return redirect()->route('modifier');

    }

    public function indice_management()
    {


   return view('indice_manager');

    }

    


}
