<?php

namespace App\Http\Controllers;

use App\Models\service_taux;
use App\Http\Requests\Request;
use App\Http\Requests\Updateservice_tauxRequest;

class ServiceTauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeservice_tauxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        //
        service_taux::create($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service_taux  $service_taux
     * @return \Illuminate\Http\Response
     */
    public function show(service_taux $service_taux)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service_taux  $service_taux
     * @return \Illuminate\Http\Response
     */
    public function edit(service_taux $service_taux)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateservice_tauxRequest  $request
     * @param  \App\Models\service_taux  $service_taux
     * @return \Illuminate\Http\Response
     */
    public function update(Updateservice_tauxRequest $request, service_taux $service_taux)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service_taux  $service_taux
     * @return \Illuminate\Http\Response
     */
    public function destroy(service_taux $service_taux)
    {
        //
    }
}
