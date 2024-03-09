<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_reel extends Model
{
    use HasFactory;


    protected $table = 'reels_service';

    public $timestamps = false;

    protected $fillable = [
        'indicateur_id',
        'service_id',
    ];

}
