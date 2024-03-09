<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tauxe extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_indicateur';

    public $timestamps = true;
    

    protected $fillable = [
        'designation_indice',
        'process_id',
        'period_id',
        'employe_id',
        'indice',
    ];

    public function services()
{ 
    return $this->belongsToMany(service::class,'taux_service','indicateur_id','service_id');
}

public function datevals()
{ 
    return $this->belongsToMany(dateval::class);
}


    public function periode()
{
    return $this->belongsTo(periode::class,'period_id','id_periode'); 
}

public function processuse()
{
    return $this->belongsTo(processuse::class,'process_id','id_processus'); 
}

public function employe()
{
    return $this->hasOne(employe::class,'id_indicateur','employe_id'); 
}



}