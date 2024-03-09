<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    use HasFactory;

    public $timestamps = true;
   

   protected $fillable = ['prenom_employe',
                         'prenom_employe',
                          'password',
                          'admin',
                          'service_id',
                           'photos' ];



    
     public function tauxes(){

        return $this->belongsToMany(tauxe::class);

     }
     
     public function reels(){

        return $this->belongsToMany(reel::class);

     }

     public function service(){

      return  $this->belongsTo(service::class,'service_id','id_service');
      
      }


}
