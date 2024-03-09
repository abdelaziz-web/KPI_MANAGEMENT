<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_taux extends Model
{
    use HasFactory;


    protected $table = 'taux_service';

    public $timestamps = false;

    protected $fillable = [
        'indicateur_id',
        'service_id',
    ];
}
