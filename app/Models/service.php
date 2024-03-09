<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;


    public $timestamps = true;


    protected $table = 'services';
    
    protected $primaryKey = 'id_service';

    

 public function tauxes()
{   
    return $this->belongsToMany(tauxe::class);
}

public function reels()
{   

    return $this->belongsToMany(reel::class);
    
}

 
  public function employe(){

   return $this->hasMany(employe::class,'service_id','id_service');

  }



}
