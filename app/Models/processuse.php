<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class processuse extends Model
{
    use HasFactory;


    public $timestamps = true;


    protected $fillable = [
      'designation_processus',
     
  ];
    
    public function tauxes(){

        return $this->belongsToMany(tauxe::class);

     }
     
     public function reels(){

        return $this->belongsToMany(reel::class);

     }
     


}
