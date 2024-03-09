<?php

namespace App\Http\Controllers;

use App\Models\service_reel;
use Illuminate\Http\Request;

class servicereel extends Controller
{
    
    public function store($request)
    {
        //
       service_reel::create($request);
    }

   
}
