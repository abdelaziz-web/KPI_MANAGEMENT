<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dateval;
use App\Models\tauxe;

class taux_dateval extends Model
{
    use HasFactory;

    protected $fillable = [
        'indicateur_id',
        'date_id',
        'numerateur' ,
        'denominateur', 
        'objectif',
        'tolerance_seuil',
    ];

    protected $primaryKey = 'indicateur_id ';


    public function datevals(){
        return $this->hasOne(dateval::class,'id_date','date_id'); 
        }


    public function tauxes(){
        return $this->hasOne(tauxe::class,'id_indicateur','indicateur_id'); 
        }
}
